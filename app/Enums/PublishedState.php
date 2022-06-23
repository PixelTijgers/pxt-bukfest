<?php

// Enum Namespacing.
namespace App\Enums;

enum PublishedState: string
{

    // Here we define the state for a page, article or post.
    case Archived = 'archived';
    case Draft = 'draft';
    case Published = 'published';
    case Unpublished = 'unpublished';
}
