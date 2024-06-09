<?php

namespace App\Enums;

enum ContactFormSubject: string
{
    case GENERAL_INQUIRY = "general_inquiry";
    case PROJECT_COLLABORATION = "project_collaboration";
    case JOB_OFFER = "job_offer";
    case BUG_REPORTING = "bug_reporting";
    case OTHER = "other";

    public function label(): string
    {
        return __(self::getTranslationKey($this->value));
    }

    public static function getLabel(string $value): string
    {
        return __(self::getTranslationKey($value));
    }

    private static function getTranslationKey(string $value): string
    {
        return match ($value) {
            self::GENERAL_INQUIRY->value => __("contact_form.subjects.general_inquiry"),
            self::PROJECT_COLLABORATION->value => __("contact_form.subjects.project_collaboration"),
            self::JOB_OFFER->value => __("contact_form.subjects.job_offer"),
            self::BUG_REPORTING->value => __("contact_form.subjects.bug_reporting"),
            self::OTHER->value => __("contact_form.subjects.other"),
        };
    }
}
