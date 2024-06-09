<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactFormSubmission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display login form
     */
    public function index()
    {

        $submissions = ContactFormSubmission::all()->sortDesc()->map(function ($item) {
            $itemData = $item->only(["id", "from", "subject", "is_handled"]);

            $createdAt = $item["created_at"]->timestamp;
            $itemData["date"] = gmdate("Y-m-d", $createdAt);
            $itemData["fullUTCString"] = gmdate("D M d Y H:i:s \G\M\TO (e)", $createdAt);
            $itemData["uTCTime"] = gmdate("H:i", $createdAt);
            return $itemData;
        })->groupBy("date");

        return view(
            "admin.index",
            ["submissions" => $submissions]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Request $request)
    {
        //
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
