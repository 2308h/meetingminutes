# Project Brief – Meeting Minutes Management System

> Keep this file in the project root. Every prompt to the agent says "follow PROJECT_BRIEF.md".
> This is a BCA academic project. Keep the code simple, clean, and easy to explain in a viva.

## Tech stack (fixed – do not change)
- Laravel 11, PHP 8.2+, MySQL 8 (database name: `meeting_minutes`)
- Blade templates + Tailwind CSS (through Laravel Breeze, Blade stack)
- Auth: Laravel Breeze (register, login, logout, profile)
- No React, Vue, Livewire, Filament, or extra admin packages
- Plain Laravel MVC: migrations, Eloquent models, resource controllers, Form Requests, Policies

## Database (must match exactly – the report already documents these tables)

### users – Laravel default

### meeting_minutes
| field | type | rule |
|---|---|---|
| id | bigint PK | |
| user_id | foreignId → users.id | cascade on delete |
| title | string | required |
| meeting_date | date | required |
| meeting_time | time | nullable |
| location | string | required (room or online link) |
| chairperson | string | required |
| secretary | string | required |
| attendees | text | required |
| agenda | text | required |
| discussion | longText | required |
| decisions | longText | required |
| status | enum('draft','final') | default 'draft' |
| timestamps | | |

### action_items
| field | type | rule |
|---|---|---|
| id | bigint PK | |
| meeting_minute_id | foreignId → meeting_minutes.id | cascade on delete |
| task | string | required |
| responsible_person | string | required |
| deadline | date | required |
| status | enum('pending','completed') | default 'pending' |
| timestamps | | |

Relationships: User hasMany MeetingMinute; MeetingMinute belongsTo User, hasMany ActionItem; ActionItem belongsTo MeetingMinute.

## Modules
1. **User Authentication** – Register, Login, Logout, Profile (Breeze)
2. **Dashboard** – cards: total meetings, draft vs final, pending action items; table of 5 recent meetings; list of pending action items with nearest deadline first (overdue ones in red)
3. **Meeting Minutes Management** – full CRUD
4. **Action Items Tracker** – add/edit/delete action items from the meeting's View page; mark pending ↔ completed
5. **Search & Filter** – search by title or location, filter by date range and status, on the list page

## Rules
- A user sees and manages only the meetings they created (enforce with a Policy, not only by hiding buttons).
- Validation through Form Request classes; show errors under each field and keep old input.
- Success flash messages after create/update/delete; confirm before delete.
- Pagination (10 per page) on the meetings list and action items list.
- Responsive layout; navigation exactly as below.

## Navigation (after login)
- Dashboard
- Meeting Minutes → All Meetings, Create New Meeting
- Action Items
- Profile / Logout

## Pages
| Page | URL |
|---|---|
| Login | /login |
| Register | /register |
| Dashboard | /dashboard |
| Meeting list | /meeting-minutes |
| Create meeting | /meeting-minutes/create |
| View meeting (with its action items) | /meeting-minutes/{id} |
| Edit meeting | /meeting-minutes/{id}/edit |
| Action items list (all, filter pending/completed) | /action-items |
| Profile | /profile |

## Out of scope (do NOT build)
Video conferencing, AI transcription, mobile app, multi-level admin panel, roles.

## Seed data
A seeder with 1 demo user (demo@example.com / password), about 8 realistic meetings, and 15 action items (mix of pending, completed, overdue) so screenshots look real.

## Working style for the agent
- Work one phase at a time; stop and show me when a phase is done.
- After each phase: run `php artisan migrate` / `php artisan test` as relevant, open the pages in the browser and check them, then `git commit` with a clear message.
- Write short comments in controllers/models; students must explain this code.
