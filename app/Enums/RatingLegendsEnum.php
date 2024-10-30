<?php

namespace App\Enums;

enum RatingLegendsEnum: string
{
    case StronglyAgree = 'Strongly Agree';
    case Agree = 'Agree';
    case Uncertain = 'Uncertain';
    case Disagree = 'Disagree';
    case StronglyDisagree = 'Strongly Disagree';
}