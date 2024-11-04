<?php
namespace App\Filters;
class UserFilter extends QueryFilter
{
    public function search($keyword)
    {
        return $this->builder
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('email', 'LIKE', '%' . $keyword . '%')
            ->orWhere('phone_number', 'LIKE', '%' . $keyword . '%');
    }

    public function status($status)
    {
        return $this->builder
        ->where('status', $status)
        ->orWhere('verification_status', $status);
    }

    /**
     * Filter posts by date range
     * Handles both single date and date range
     *
     * @param string $range Single date or date range (comma-separated)
     * Example Usage:
     * Single date: /user?dateRange=2024-03-01
     * Date range: /user?dateRange=2024-03-01,2024-03-31
     */
    public function dateRange($range)
    {
        try {
            // Handle single date
            if (!str_contains($range, ',')) {
                return $this->builder->whereDate('created_at', date('Y-m-d', strtotime($range)));
            }

            // Handle date range
            [$from, $to] = explode(',', $range);

            // Convert and validate dates
            $fromDate = date('Y-m-d', strtotime($from));
            $toDate = date('Y-m-d', strtotime($to));

            if ($fromDate && $toDate) {
                return $this->builder->whereBetween('created_at', [
                    $fromDate . ' 00:00:00',
                    $toDate . ' 23:59:59'
                ]);
            }

            return $this->builder;
        } catch (\Exception $e) {
            return $this->builder; // Return unmodified query if dates are invalid
        }
    }

    /**
     * Filter posts by date and time range
     *
     * @param string $range DateTime range (comma-separated)
     * Example Usage:
     * URL: /blog?dateTimeRange=2024-03-01 09:00:00,2024-03-31 17:00:00
     */
    public function dateTimeRange($range)
    {
        try {
            [$from, $to] = explode(',', $range);

            return $this->builder->whereBetween('created_at', [
                date('Y-m-d H:i:s', strtotime($from)),
                date('Y-m-d H:i:s', strtotime($to)),
            ]);
        } catch (\Exception $e) {
            return $this->builder;
        }
    }

    /**
     * Filter posts by specific month
     *
     * @param int $month Month number (1-12)
     * Example Usage:
     * URL: /blog?month=3 (for March)
     */
    public function month($month)
    {
        return $this->builder->whereMonth('created_at', $month);
    }

    /**
     * Filter posts by specific year
     *
     * @param int $year Year (e.g., 2024)
     * Example Usage:
     * URL: /blog?year=2024
     */
    public function year($year)
    {
        return $this->builder->whereYear('created_at', $year);
    }

    /**
     * Filter posts by predefined time periods
     *
     * @param string $period Predefined period (today, yesterday, this_week, etc.)
     * Example Usage:
     * URL: /blog?period=this_week
     * URL: /blog?period=last_month
     *
     * Available periods:
     * - today
     * - yesterday
     * - this_week
     * - last_week
     * - this_month
     * - last_month
     */
    public function period($period)
    {
        switch ($period) {
            case 'today':
                return $this->builder->whereDate('created_at', today());

            case 'yesterday':
                return $this->builder->whereDate('created_at', today()->subDay());

            case 'this_week':
                return $this->builder->whereBetween('created_at', [
                    now()->startOfWeek(),
                    now()->endOfWeek()
                ]);

            case 'last_week':
                return $this->builder->whereBetween('created_at', [
                    now()->subWeek()->startOfWeek(),
                    now()->subWeek()->endOfWeek()
                ]);

            case 'this_month':
                return $this->builder->whereMonth('created_at', now()->month);

            case 'last_month':
                return $this->builder->whereMonth('created_at', now()->subMonth()->month);

            default:
                return $this->builder;
        }
    }
}