<?php

namespace App\Enum;
enum ChannelVisibility: string
{
    case PUBLIC = 'public';
    case PRIVATE = 'private';
    case PROTECTED = 'protected';
}