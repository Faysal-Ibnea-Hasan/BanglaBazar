<?php
namespace App\View\Components;

use Illuminate\View\Component;

/**
 * Modal Component
 * A reusable component for rendering a Bootstrap modal in Laravel views.
 */
class Modal extends Component
{
    /**
     * Title of the modal.
     *
     * @var string
     */
    public $title;

    /**
     * Unique ID for the modal, used for targeting with JavaScript.
     *
     * @var string|null
     */
    public $id;

    /**
     * Size of the modal, can be 'modal-lg', 'modal-sm', or null for default size.
     *
     * @var string|null
     */
    public $size;

    /**
     * Determines if the modal content should be scrollable.
     *
     * @var bool
     */
    public $scrollable;

    /**
     * Determines if the modal should be vertically centered.
     *
     * @var bool
     */
    public $centered;

    /**
     * Create a new component instance.
     *
     * @param string $title      Title displayed on the modal header.
     * @param string|null $id    Unique ID for modal identification.
     * @param string|null $size  Optional size of the modal (e.g., 'modal-lg').
     * @param bool $scrollable   If true, makes the modal body scrollable.
     * @param bool $centered     If true, centers the modal vertically.
     */
    public function __construct(
        $title = '',
        $id = null,
        $size = null,
        $scrollable = false,
        $centered = false,
    ) {
        // Assign passed parameters to class properties
        $this->title = $title;
        $this->id = $id;
        $this->size = $size;
        $this->scrollable = $scrollable;
        $this->centered = $centered;
    }

    /**
     * Get the view or contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        // Returns the Blade view for the modal component
        return view('components.modal.modal');
    }
}
