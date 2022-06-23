<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class File extends Component
{
    /**
     * The input name.
     *
     * @var string
     */
    public $name;

    /**
     * The readonly attribute.
     *
     * @var boolean
     */
    public $file;

    /**
     * The required attribute.
     *
     * @var boolean
     */
    public $extensions;

    /**
     * The input label.
     *
     * @var string
     */
    public $label;

    /**
     * The input id.
     *
     * @var string
     */
    public $id;

    /**
     * The input description.
     *
     * @var string
     */
    public $description;

    /**
     * The input class.
     *
     * @var string
     */
    public $class;

    /**
     * The input row (custom).
     *
     * @var boolean
     */
    public $row;

    /**
     * The input cols (custom).
     *
     * @var array
     */
    public $cols;

    /**
     * The required attribute.
     *
     * @var boolean
     */
    public $required;

    /**
     * The readonly attribute.
     *
     * @var boolean
     */
    public $readonly;

    /**
     * The required attribute.
     *
     * @var boolean
     */
    public $disabled;

    /**
     * The duplicate attribute.
     *
     * @var boolean
     */
    public $duplicate;

    /**
     * The duplicate attribute.
     *
     * @var boolean
     */
    public $duplicateClass;

    /**
     * The duplicate attribute.
     *
     * @var boolean
     */
    public $duplicateName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $file, $extensions, $id = null, $label = null, $description = false, $class = null, $row = false, $cols = [], $required = true, $readonly = false, $disabled = false, $duplicate = false, $duplicateClass = null, $duplicateName = null)
    {
        $this->name = $name;
        $this->file = $file;
        $this->extensions = $extensions;
        $this->id = $id;
        $this->label = $label;
        $this->description = $description;
        $this->class = $class;
        $this->row = $row;
        $this->cols = $cols;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
        $this->duplicate = $duplicate;
        $this->duplicateClass = $duplicateClass;
        $this->duplicateName = $duplicateName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.file');
    }
}
