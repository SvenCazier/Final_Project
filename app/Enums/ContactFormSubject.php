<?php

namespace App\Enums;

enum ContactFormSubject: string
{
    case GENERAL_INQUIRY = "general_inquiry";
    case PROJECT_COLLABORATION = "project_collaboration";
    case JOB_OFFERS = "job_offers";
    case BUG_REPORTING = "bug_reporting";
    case OTHER = "other";

    public function label(): string
    {
        return match ($this) {
            self::GENERAL_INQUIRY => __("contact_form.subjects.general_inquiry"),
            self::PROJECT_COLLABORATION => __("contact_form.subjects.project_collaboration"),
            self::JOB_OFFERS => __("contact_form.subjects.employment_opportunities"),
            self::BUG_REPORTING => __("contact_form.subjects.bug_reporting"),
            self::OTHER => __("contact_form.subjects.other"),
        };
    }

    public static function labels(): array
    {
        return array_map(fn ($subject) => $subject->label(), self::cases());
    }
}
