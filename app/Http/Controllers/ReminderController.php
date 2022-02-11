<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateReminderRequest;
use App\Http\Requests\UpdateReminderRequest;
use App\Models\Reminder;

class ReminderController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $reminders = [
            'futurs' => [],
            'today' => [],
            'without_date' => [],
            'previous' => []
        ];

        $userReminders = Auth::user()->reminders;

        $userReminders->map(function (Reminder $item) use (&$reminders) {
            if ($item->expire_at?->isToday()) {
                $reminders['today'][] = $item;
            } else if ($item->expire_at?->isFuture()) {
                $reminders['futurs'][] = $item;
            } else if ($item->expire_at?->isPast()) {
                $reminders['previous'][] = $item;
            } else {
                $reminders['without_date'][] = $item;
            }
        });

        return view('reminders.index', [
            'reminders' => $reminders,
            'count' => $userReminders->count()
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('reminders.create', [
            'teams' => Auth::user()->teams
        ]);
    }

    /**
     * @param CreateReminderRequest $request
     * 
     * @return RedirectResponse
     */
    public function store(CreateReminderRequest $request): RedirectResponse
    {
        $reminder = Reminder::query()
            ->create([
                'user_id' => Auth::user()->getAuthIdentifier(),
                'team_id' => $request->input('team_id'),
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'expire_at' => $request->input('expire_at')
            ]);

        return redirect()->route('reminders.edit', $reminder->id)->with('success', __('reminder.successfully_created', [
            'name' => $reminder->name
        ]));
    }

    /**
     * @param string $id
     * 
     * @return View
     */
    public function edit(string $id): View
    {
        return view('reminders.edit', [
            'reminder' => Reminder::query()->find($id),
            'teams' => Auth::user()->teams
        ]);
    }

    /**
     * @param UpdateReminderRequest $request
     * 
     * @return RedirectResponse
     */
    public function update(UpdateReminderRequest $request, string $id): RedirectResponse
    {
        $reminder = Reminder::query()
            ->find($id);

        $reminder->update([
            'team_id' => $request->input('team_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'expire_at' => $request->input('expire_at')
        ]);

        return redirect()->route('reminders.edit', $reminder->id)->with('success', __('reminder.successfully_updated', [
            'name' => $reminder->name
        ]));
    }

    /**
     * @param string $id
     * 
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $reminder = Reminder::query()->find($id);

        if ($reminder->user_id !== Auth::user()->getAuthIdentifier()) {
            return redirect()->back()->with('error', __('reminder.cant_create'));
        }

        $name = $reminder?->name;

        Reminder::query()
            ->where('id', $id)
            ->delete();

        return redirect()->route('reminders.index')->with('success', __('reminder.successfully_destroyed', [
            'name' => $name
        ]));
    }
}
