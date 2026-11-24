<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\MeetingMinute;
use App\Models\ActionItem;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * Creates 1 demo user, 8 realistic meetings, and 15 action items.
     */
    public function run(): void
    {
        // ── 1. Demo User ────────────────────────────────────────────────
        $user = User::firstOrCreate(
            ['email' => 'demo@example.com'],
            [
                'name'     => 'Demo User',
                'password' => Hash::make('password'),
            ]
        );

        // ── 2. Meetings ─────────────────────────────────────────────────
        $meetings = [
            [
                'title'        => 'Q1 Project Kickoff Meeting',
                'meeting_date' => Carbon::now()->subDays(60)->toDateString(),
                'meeting_time' => '10:00:00',
                'location'     => 'Conference Room A',
                'chairperson'  => 'Dr. Priya Sharma',
                'secretary'    => 'Rahul Verma',
                'attendees'    => "Dr. Priya Sharma\nRahul Verma\nAnita Patel\nSuresh Kumar\nMeena Joshi",
                'agenda'       => "1. Project scope overview\n2. Team roles and responsibilities\n3. Timeline and milestones\n4. Resource allocation",
                'discussion'   => "The team discussed the overall project scope and confirmed deliverables. Dr. Sharma emphasized the need for weekly status updates. Resource allocation was debated — Suresh will handle backend, Anita the frontend. Timeline was set for 3 months with two review milestones.",
                'decisions'    => "1. Weekly standups every Monday at 10 AM.\n2. Suresh leads backend development.\n3. Anita leads frontend development.\n4. First milestone review on Week 6.",
                'status'       => 'final',
            ],
            [
                'title'        => 'Budget Review – Second Quarter',
                'meeting_date' => Carbon::now()->subDays(50)->toDateString(),
                'meeting_time' => '14:00:00',
                'location'     => 'Board Room',
                'chairperson'  => 'Vikram Singh',
                'secretary'    => 'Pooja Nair',
                'attendees'    => "Vikram Singh\nPooja Nair\nArjun Mehta\nSneha Desai",
                'agenda'       => "1. Q1 budget actuals vs forecast\n2. Q2 budget planning\n3. Cost-saving measures",
                'discussion'   => "Q1 spending came in 12% over budget due to unexpected software licensing costs. Arjun proposed renegotiating vendor contracts. Sneha suggested moving some tools to open-source alternatives. Q2 budget was set with a 10% contingency buffer.",
                'decisions'    => "1. Arjun to renegotiate Adobe licenses by end of month.\n2. Evaluate open-source alternatives for 3 tools.\n3. Q2 budget approved with 10% contingency.",
                'status'       => 'final',
            ],
            [
                'title'        => 'Product Roadmap Planning Session',
                'meeting_date' => Carbon::now()->subDays(42)->toDateString(),
                'meeting_time' => '11:00:00',
                'location'     => 'https://meet.google.com/abc-defg-hij',
                'chairperson'  => 'Kavita Reddy',
                'secretary'    => 'Mohit Agarwal',
                'attendees'    => "Kavita Reddy\nMohit Agarwal\nDeepak Jain\nRiya Kapoor\nSameer Bose",
                'agenda'       => "1. Feature backlog review\n2. Prioritisation exercise\n3. Release schedule\n4. Stakeholder communication plan",
                'discussion'   => "Backlog had 47 items; team voted on top 15 for the next release. Deepak raised concerns about technical debt. Riya presented customer feedback indicating the search feature is a top request. Release schedule set for 8-week sprints.",
                'decisions'    => "1. Search feature moves to Sprint 1 priority.\n2. Deepak to draft tech-debt reduction plan.\n3. Bi-weekly stakeholder updates via email.\n4. Next release target: 8 weeks from today.",
                'status'       => 'final',
            ],
            [
                'title'        => 'HR Policy Update Meeting',
                'meeting_date' => Carbon::now()->subDays(35)->toDateString(),
                'meeting_time' => '09:30:00',
                'location'     => 'HR Conference Room',
                'chairperson'  => 'Sunita Pillai',
                'secretary'    => 'Arun Thakur',
                'attendees'    => "Sunita Pillai\nArun Thakur\nAll Department Heads",
                'agenda'       => "1. Remote work policy revision\n2. Leave policy updates\n3. Performance review cycle changes",
                'discussion'   => "Remote work policy updated to allow 3 days WFH per week effective next month. Leave policy now includes 2 extra casual leaves. Performance reviews will shift from annual to bi-annual. Department heads raised concerns about consistent remote monitoring.",
                'decisions'    => "1. New remote work policy effective from next month.\n2. 2 additional casual leaves added to all employees.\n3. Performance reviews: June and December each year.\n4. Managers to attend remote-team training workshop.",
                'status'       => 'final',
            ],
            [
                'title'        => 'Website Redesign Kickoff',
                'meeting_date' => Carbon::now()->subDays(28)->toDateString(),
                'meeting_time' => '15:00:00',
                'location'     => 'Design Studio',
                'chairperson'  => 'Neha Gupta',
                'secretary'    => 'Karan Shah',
                'attendees'    => "Neha Gupta\nKaran Shah\nFarhan Ali\nPreeti Menon",
                'agenda'       => "1. Current site pain points\n2. New design direction\n3. Technology stack decision\n4. Project timeline",
                'discussion'   => "Users report slow page loads and confusing navigation. Farhan presented three design mockups; modern card-based layout was preferred. Tech stack decision: Laravel + Blade + Tailwind (consistent with internal tools). Timeline: 10 weeks to launch.",
                'decisions'    => "1. Card-based design mockup selected.\n2. Tech stack: Laravel + Blade + Tailwind CSS.\n3. Farhan leads UI/UX; Preeti leads development.\n4. Beta launch in 10 weeks.",
                'status'       => 'final',
            ],
            [
                'title'        => 'Monthly Operations Review – October',
                'meeting_date' => Carbon::now()->subDays(20)->toDateString(),
                'meeting_time' => '10:00:00',
                'location'     => 'Main Conference Room',
                'chairperson'  => 'Dr. Priya Sharma',
                'secretary'    => 'Rahul Verma',
                'attendees'    => "Dr. Priya Sharma\nRahul Verma\nAll Team Leads",
                'agenda'       => "1. KPI review\n2. Blockers and escalations\n3. Next month targets",
                'discussion'   => "KPIs mostly on track; customer satisfaction score dropped by 4 points due to delayed support tickets. Backend team flagged server performance issues during peak hours. Next month targets include resolving all P1 bugs and improving response time by 20%.",
                'decisions'    => "1. Support ticket SLA to be reviewed and updated.\n2. Infrastructure team to investigate peak-hour performance.\n3. All P1 bugs resolved before next review.\n4. Monthly review continues on last Monday each month.",
                'status'       => 'final',
            ],
            [
                'title'        => 'Security Audit Planning',
                'meeting_date' => Carbon::now()->subDays(10)->toDateString(),
                'meeting_time' => '13:00:00',
                'location'     => 'IT Department – Room 204',
                'chairperson'  => 'Rajesh Kumar',
                'secretary'    => 'Divya Nair',
                'attendees'    => "Rajesh Kumar\nDivya Nair\nAmit Sharma\nSonia Verma",
                'agenda'       => "1. Audit scope definition\n2. Vendor selection\n3. Timeline and access provisioning",
                'discussion'   => "Scope covers network, application, and data layers. Three vendors shortlisted. Access provisioning needs CTO sign-off. Amit flagged potential gaps in API authentication. Sonia to prepare data inventory for auditors.",
                'decisions'    => "1. Amit to patch API authentication gaps before audit.\n2. Sonia to complete data inventory by Friday.\n3. Vendor selection decision by next week.\n4. Audit begins in 3 weeks.",
                'status'       => 'draft',
            ],
            [
                'title'        => 'Sprint 3 Retrospective',
                'meeting_date' => Carbon::now()->subDays(3)->toDateString(),
                'meeting_time' => '16:00:00',
                'location'     => 'https://zoom.us/j/123456789',
                'chairperson'  => 'Kavita Reddy',
                'secretary'    => 'Mohit Agarwal',
                'attendees'    => "Kavita Reddy\nMohit Agarwal\nDeepak Jain\nRiya Kapoor\nSameer Bose\nFarhan Ali",
                'agenda'       => "1. What went well\n2. What could be improved\n3. Action items for Sprint 4",
                'discussion'   => "Team completed 18 of 22 story points. Search feature delivered successfully. 4 items carried over due to unexpected third-party API changes. Team morale is high. Communication between frontend and backend teams improved significantly. Suggested adding a mid-sprint sync.",
                'decisions'    => "1. Mid-sprint sync added every Wednesday at 3 PM.\n2. API change management process to be documented.\n3. Sprint 4 starts Monday with 22 story points planned.\n4. Retrospective format maintained for next sprint.",
                'status'       => 'draft',
            ],
        ];

        $createdMeetings = [];
        foreach ($meetings as $meetingData) {
            $createdMeetings[] = $user->meetingMinutes()->create($meetingData);
        }

        // ── 3. Action Items (15 total – mix of pending, completed, overdue) ─
        $actionItemsData = [
            // Meeting 1 – Q1 Kickoff (overdue – past deadline)
            ['meeting' => 0, 'task' => 'Set up weekly standup calendar invites for all team members', 'person' => 'Rahul Verma',  'deadline' => Carbon::now()->subDays(55), 'status' => 'completed'],
            ['meeting' => 0, 'task' => 'Prepare project scope document and share with stakeholders',   'person' => 'Dr. Priya Sharma', 'deadline' => Carbon::now()->subDays(50), 'status' => 'completed'],

            // Meeting 2 – Budget (overdue pending)
            ['meeting' => 1, 'task' => 'Renegotiate Adobe license contracts with vendor',              'person' => 'Arjun Mehta',  'deadline' => Carbon::now()->subDays(20), 'status' => 'pending'],
            ['meeting' => 1, 'task' => 'Evaluate open-source alternatives for design tools',           'person' => 'Sneha Desai',  'deadline' => Carbon::now()->subDays(15), 'status' => 'completed'],

            // Meeting 3 – Roadmap
            ['meeting' => 2, 'task' => 'Draft tech-debt reduction plan and share with team',           'person' => 'Deepak Jain',  'deadline' => Carbon::now()->subDays(30), 'status' => 'pending'],
            ['meeting' => 2, 'task' => 'Set up bi-weekly stakeholder email update template',           'person' => 'Riya Kapoor',  'deadline' => Carbon::now()->subDays(35), 'status' => 'completed'],
            ['meeting' => 2, 'task' => 'Finalise Sprint 1 backlog with search feature stories',        'person' => 'Mohit Agarwal','deadline' => Carbon::now()->subDays(28), 'status' => 'completed'],

            // Meeting 4 – HR Policy
            ['meeting' => 3, 'task' => 'Distribute updated remote work policy to all employees',       'person' => 'Arun Thakur',  'deadline' => Carbon::now()->subDays(25), 'status' => 'completed'],
            ['meeting' => 3, 'task' => 'Schedule remote-team management training workshop for managers','person' => 'Sunita Pillai','deadline' => Carbon::now()->subDays(10), 'status' => 'pending'],

            // Meeting 5 – Website Redesign
            ['meeting' => 4, 'task' => 'Finalise wireframes and share design mockup for approval',     'person' => 'Farhan Ali',   'deadline' => Carbon::now()->subDays(14), 'status' => 'completed'],
            ['meeting' => 4, 'task' => 'Set up Laravel development environment and Git repository',    'person' => 'Preeti Menon', 'deadline' => Carbon::now()->subDays(7),  'status' => 'pending'],

            // Meeting 6 – Operations Review
            ['meeting' => 5, 'task' => 'Review and update support ticket SLA document',                'person' => 'Rahul Verma',  'deadline' => Carbon::now()->subDays(5),  'status' => 'pending'],
            ['meeting' => 5, 'task' => 'Investigate peak-hour server performance and report findings', 'person' => 'Suresh Kumar', 'deadline' => Carbon::now()->addDays(3),  'status' => 'pending'],

            // Meeting 7 – Security Audit
            ['meeting' => 6, 'task' => 'Patch API authentication gaps identified in review',           'person' => 'Amit Sharma',  'deadline' => Carbon::now()->addDays(5),  'status' => 'pending'],
            ['meeting' => 6, 'task' => 'Complete data inventory spreadsheet for auditors',             'person' => 'Sonia Verma',  'deadline' => Carbon::now()->addDays(2),  'status' => 'pending'],
        ];

        foreach ($actionItemsData as $item) {
            ActionItem::create([
                'meeting_minute_id' => $createdMeetings[$item['meeting']]->id,
                'task'               => $item['task'],
                'responsible_person' => $item['person'],
                'deadline'           => $item['deadline']->toDateString(),
                'status'             => $item['status'],
            ]);
        }
    }
}
