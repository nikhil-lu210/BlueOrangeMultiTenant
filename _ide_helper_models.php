<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Announcement{
/**
 * App\Models\Announcement\Announcement
 *
 * @property string|array $description
 * @property-read \App\Models\User|null $announcer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Announcement\AnnouncementComment> $comments
 * @property-read int|null $comments_count
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement query()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Announcement withoutTrashed()
 */
	class Announcement extends \Eloquent {}
}

namespace App\Models\Announcement{
/**
 * App\Models\Announcement\AnnouncementComment
 *
 * @property string|array $comment
 * @property-read \App\Models\Announcement\Announcement|null $announcement
 * @property-read \App\Models\User|null $commenter
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementComment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementComment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AnnouncementComment withoutTrashed()
 */
	class AnnouncementComment extends \Eloquent {}
}

namespace App\Models\Attendance{
/**
 * App\Models\Attendance\Attendance
 *
 * @property-read \App\Models\User|null $clockin_scanner
 * @property-read \App\Models\User|null $clockout_scanner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DailyBreak\DailyBreak> $daily_breaks
 * @property-read int|null $daily_breaks_count
 * @property-read \App\Models\EmployeeShift\EmployeeShift|null $employee_shift
 * @property-read mixed $total_break_time
 * @property-read int $total_breaks_taken
 * @property-read mixed $total_over_break
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attendance\Issue\AttendanceIssue> $issues
 * @property-read int|null $issues_count
 * @property-write mixed $clock_in
 * @property-write mixed $clock_out
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\Attendance\AttendanceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance query()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Attendance withoutTrashed()
 */
	class Attendance extends \Eloquent {}
}

namespace App\Models\Attendance\Issue{
/**
 * App\Models\Attendance\Issue\AttendanceIssue
 *
 * @property string|array $reason
 * @property string|array $note
 * @property-read \App\Models\Attendance\Attendance|null $attendance
 * @property-read \App\Models\EmployeeShift\EmployeeShift|null $employee_shift
 * @property-write mixed $clock_in
 * @property-write mixed $clock_out
 * @property-read \App\Models\User|null $updater
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceIssue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceIssue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceIssue onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceIssue query()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceIssue withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AttendanceIssue withoutTrashed()
 */
	class AttendanceIssue extends \Eloquent {}
}

namespace App\Models\Chatting{
/**
 * App\Models\Chatting\Chatting
 *
 * @property string|array $message
 * @property-read \App\Models\User|null $receiver
 * @property-read \App\Models\User|null $sender
 * @property-read \App\Models\Task\Task|null $task
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatting withoutTrashed()
 */
	class Chatting extends \Eloquent {}
}

namespace App\Models\Chatting{
/**
 * App\Models\Chatting\ChattingGroup
 *
 * @property-read \App\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chatting\GroupChatting> $group_messages
 * @property-read int|null $group_messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $group_users
 * @property-read int|null $group_users_count
 * @method static \Illuminate\Database\Eloquent\Builder|ChattingGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChattingGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChattingGroup onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ChattingGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChattingGroup withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ChattingGroup withoutTrashed()
 */
	class ChattingGroup extends \Eloquent {}
}

namespace App\Models\Chatting{
/**
 * App\Models\Chatting\GroupChatting
 *
 * @property string|array $message
 * @property-read \App\Models\Chatting\ChattingGroup|null $group
 * @property-read \App\Models\User|null $sender
 * @method static \Illuminate\Database\Eloquent\Builder|GroupChatting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupChatting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupChatting onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupChatting query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupChatting withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupChatting withoutTrashed()
 */
	class GroupChatting extends \Eloquent {}
}

namespace App\Models\DailyBreak{
/**
 * App\Models\DailyBreak\DailyBreak
 *
 * @property string|array $note
 * @property-read \App\Models\Attendance\Attendance|null $attendance
 * @property-write mixed $clock_in
 * @property-write mixed $clock_out
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\DailyBreak\DailyBreakFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|DailyBreak newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyBreak newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyBreak onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyBreak query()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyBreak withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyBreak withoutTrashed()
 */
	class DailyBreak extends \Eloquent {}
}

namespace App\Models\DailyWorkUpdate{
/**
 * App\Models\DailyWorkUpdate\DailyWorkUpdate
 *
 * @property string|array $work_update
 * @property string|array $note
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FileMedia\FileMedia> $files
 * @property-read int|null $files_count
 * @property-read \App\Models\User|null $team_leader
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|DailyWorkUpdate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyWorkUpdate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyWorkUpdate onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyWorkUpdate query()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyWorkUpdate withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DailyWorkUpdate withoutTrashed()
 */
	class DailyWorkUpdate extends \Eloquent {}
}

namespace App\Models\EmployeeShift{
/**
 * App\Models\EmployeeShift\EmployeeShift
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attendance\Attendance> $attendances
 * @property-read int|null $attendances_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeShift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeShift newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeShift onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeShift query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeShift withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|EmployeeShift withoutTrashed()
 */
	class EmployeeShift extends \Eloquent {}
}

namespace App\Models\FileMedia{
/**
 * App\Models\FileMedia\FileMedia
 *
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $fileable
 * @property-read \App\Models\User|null $uploader
 * @method static \Illuminate\Database\Eloquent\Builder|FileMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileMedia onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FileMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|FileMedia withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FileMedia withoutTrashed()
 */
	class FileMedia extends \Eloquent {}
}

namespace App\Models\Holiday{
/**
 * App\Models\Holiday\Holiday
 *
 * @property string|array $description
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday query()
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Holiday withoutTrashed()
 */
	class Holiday extends \Eloquent {}
}

namespace App\Models\IncomeExpense{
/**
 * App\Models\IncomeExpense\Expense
 *
 * @property string|array $description
 * @property-read \App\Models\IncomeExpense\IncomeExpenseCategory|null $category
 * @property-read \App\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FileMedia\FileMedia> $files
 * @property-read int|null $files_count
 * @method static \Database\Factories\IncomeExpense\ExpenseFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense query()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense withoutTrashed()
 */
	class Expense extends \Eloquent {}
}

namespace App\Models\IncomeExpense{
/**
 * App\Models\IncomeExpense\Income
 *
 * @property string|array $description
 * @property-read \App\Models\IncomeExpense\IncomeExpenseCategory|null $category
 * @property-read \App\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FileMedia\FileMedia> $files
 * @property-read int|null $files_count
 * @method static \Database\Factories\IncomeExpense\IncomeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Income newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Income newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Income onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Income query()
 * @method static \Illuminate\Database\Eloquent\Builder|Income withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Income withoutTrashed()
 */
	class Income extends \Eloquent {}
}

namespace App\Models\IncomeExpense{
/**
 * App\Models\IncomeExpense\IncomeExpenseCategory
 *
 * @property string|array $description
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomeExpense\Expense> $expenses
 * @property-read int|null $expenses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncomeExpense\Income> $incomes
 * @property-read int|null $incomes_count
 * @method static \Database\Factories\IncomeExpense\IncomeExpenseCategoryFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeExpenseCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeExpenseCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeExpenseCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeExpenseCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeExpenseCategory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|IncomeExpenseCategory withoutTrashed()
 */
	class IncomeExpenseCategory extends \Eloquent {}
}

namespace App\Models\Leave{
/**
 * App\Models\Leave\LeaveAllowed
 *
 * @property \Carbon\CarbonInterval $casual_leave
 * @property \Carbon\CarbonInterval $earned_leave
 * @property \App\Models\Leave\Carbon $implemented_from
 * @property \App\Models\Leave\Carbon $implemented_to
 * @property \Carbon\CarbonInterval $sick_leave
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Leave\LeaveHistory> $leave_histories
 * @property-read int|null $leave_histories_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAllowed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAllowed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAllowed onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAllowed query()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAllowed withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAllowed withoutTrashed()
 */
	class LeaveAllowed extends \Eloquent {}
}

namespace App\Models\Leave{
/**
 * App\Models\Leave\LeaveAvailable
 *
 * @property \Carbon\CarbonInterval $casual_leave
 * @property \Carbon\CarbonInterval $earned_leave
 * @property \Illuminate\Support\Carbon $for_year
 * @property \Carbon\CarbonInterval $sick_leave
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAvailable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAvailable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAvailable onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAvailable query()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAvailable withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveAvailable withoutTrashed()
 */
	class LeaveAvailable extends \Eloquent {}
}

namespace App\Models\Leave{
/**
 * App\Models\Leave\LeaveHistory
 *
 * @property string $reason
 * @property string $reviewer_note
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FileMedia\FileMedia> $files
 * @property-read int|null $files_count
 * @property \Carbon\CarbonInterval $total_leave
 * @property-read \App\Models\Leave\LeaveAllowed|null $leave_allowed
 * @property-read \App\Models\User|null $reviewer
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveHistory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveHistory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LeaveHistory withoutTrashed()
 */
	class LeaveHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PermissionModule
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule query()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionModule withoutTrashed()
 */
	class PermissionModule extends \Eloquent {}
}

namespace App\Models\Salary\Monthly{
/**
 * App\Models\Salary\Monthly\MonthlySalary
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FileMedia\FileMedia> $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Salary\Monthly\MonthlySalaryBreakdown> $monthly_salary_breakdowns
 * @property-read int|null $monthly_salary_breakdowns_count
 * @property-read \App\Models\User|null $payer
 * @property-read \App\Models\Salary\Salary|null $salary
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalary onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalary query()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalary withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalary withoutTrashed()
 */
	class MonthlySalary extends \Eloquent {}
}

namespace App\Models\Salary\Monthly{
/**
 * App\Models\Salary\Monthly\MonthlySalaryBreakdown
 *
 * @property-read \App\Models\Salary\Monthly\MonthlySalary|null $monthly_salary
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalaryBreakdown newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalaryBreakdown newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalaryBreakdown onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalaryBreakdown query()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalaryBreakdown withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|MonthlySalaryBreakdown withoutTrashed()
 */
	class MonthlySalaryBreakdown extends \Eloquent {}
}

namespace App\Models\Salary{
/**
 * App\Models\Salary\Salary
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Salary\Monthly\MonthlySalary> $monthly_salaries
 * @property-read int|null $monthly_salaries_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Salary newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary query()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Salary withoutTrashed()
 */
	class Salary extends \Eloquent {}
}

namespace App\Models\Settings{
/**
 * App\Models\Settings\Settings
 *
 * @property mixed $value
 * @method static \Illuminate\Database\Eloquent\Builder|Settings newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Settings query()
 */
	class Settings extends \Eloquent {}
}

namespace App\Models\Shortcut{
/**
 * App\Models\Shortcut\Shortcut
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Shortcut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shortcut newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shortcut onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Shortcut query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shortcut withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Shortcut withoutTrashed()
 */
	class Shortcut extends \Eloquent {}
}

namespace App\Models\Task{
/**
 * App\Models\Task\Task
 *
 * @property string|array $description
 * @property-read \App\Models\Chatting\Chatting|null $chatting
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task\TaskComment> $comments
 * @property-read int|null $comments_count
 * @property-read \App\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FileMedia\FileMedia> $files
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task\TaskHistory> $histories
 * @property-read int|null $histories_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Task withoutTrashed()
 */
	class Task extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models\Task{
/**
 * App\Models\Task\TaskComment
 *
 * @property string|array $comment
 * @property-read \App\Models\User|null $commenter
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FileMedia\FileMedia> $files
 * @property-read int|null $files_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Task\Task|null $task
 * @method static \Illuminate\Database\Eloquent\Builder|TaskComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskComment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskComment query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskComment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskComment withoutTrashed()
 */
	class TaskComment extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models\Task{
/**
 * App\Models\Task\TaskHistory
 *
 * @property string|array $note
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FileMedia\FileMedia> $files
 * @property-read int|null $files_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\Task\Task|null $task
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|TaskHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskHistory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskHistory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TaskHistory withoutTrashed()
 */
	class TaskHistory extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models{
/**
 * App\Models\Tenant
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array|null $data
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Stancl\Tenancy\Database\Models\Domain> $domains
 * @property-read int|null $domains_count
 * @method static \Stancl\Tenancy\Database\TenantCollection<int, static> all($columns = ['*'])
 * @method static \Stancl\Tenancy\Database\TenantCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUpdatedAt($value)
 */
	class Tenant extends \Eloquent implements \Stancl\Tenancy\Contracts\TenantWithDatabase {}
}

namespace App\Models\Ticket{
/**
 * App\Models\Ticket\ItTicket
 *
 * @property string|array $description
 * @property string|array $solver_note
 * @property-read \App\Models\User|null $creator
 * @property array $seen_by
 * @property-read \App\Models\User|null $solver
 * @method static \Illuminate\Database\Eloquent\Builder|ItTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ItTicket onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder|ItTicket withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ItTicket withoutTrashed()
 */
	class ItTicket extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Announcement\AnnouncementComment> $announcement_comments
 * @property-read int|null $announcement_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Announcement\Announcement> $announcements
 * @property-read int|null $announcements_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attendance\Attendance> $attendances
 * @property-read int|null $attendances_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Chatting\ChattingGroup> $chatting_groups
 * @property-read int|null $chatting_groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task\Task> $created_tasks
 * @property-read int|null $created_tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DailyBreak\DailyBreak> $daily_breaks
 * @property-read int|null $daily_breaks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DailyWorkUpdate\DailyWorkUpdate> $daily_work_updates
 * @property-read int|null $daily_work_updates_count
 * @property-read \App\Models\User\Employee\Employee|null $employee
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EmployeeShift\EmployeeShift> $employee_shifts
 * @property-read int|null $employee_shifts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $employee_team_leaders
 * @property-read int|null $employee_team_leaders_count
 * @property-read \App\Models\User|null $active_team_leader
 * @property-read string $alias_name
 * @property-read \App\Models\LeaveAllowed|null $allowed_leave
 * @property-read \App\Models\Salary|null $current_salary
 * @property-read \App\Models\EmployeeShift|null $current_shift
 * @property-read string $full_name
 * @property-read \Spatie\Permission\Models\Role|null $role
 * @property-read \App\Models\Collection $user_interactions
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $interacted_users
 * @property-read int|null $interacted_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $interacting_users
 * @property-read int|null $interacting_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket\ItTicket> $it_ticket_solves
 * @property-read int|null $it_ticket_solves_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket\ItTicket> $it_tickets
 * @property-read int|null $it_tickets_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Leave\LeaveAllowed> $leave_alloweds
 * @property-read int|null $leave_alloweds_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Leave\LeaveAvailable> $leave_availables
 * @property-read int|null $leave_availables_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Leave\LeaveHistory> $leave_histories
 * @property-read int|null $leave_histories_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User\LoginHistory> $login_logout_histories
 * @property-read int|null $login_logout_histories_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Salary\Monthly\MonthlySalary> $monthly_salaries
 * @property-read int|null $monthly_salaries_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Salary\Monthly\MonthlySalary> $paid_salaries
 * @property-read int|null $paid_salaries_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Salary\Salary> $salaries
 * @property-read int|null $salaries_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attendance\Attendance> $scanner_clockins
 * @property-read int|null $scanner_clockins_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Attendance\Attendance> $scanner_clockouts
 * @property-read int|null $scanner_clockouts_count
 * @property-write mixed $first_name
 * @property-write mixed $last_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Shortcut\Shortcut> $shortcuts
 * @property-read int|null $shortcuts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task\TaskComment> $task_comments
 * @property-read int|null $task_comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Task\Task> $tasks
 * @property-read int|null $tasks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $tl_employees
 * @property-read int|null $tl_employees_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DailyWorkUpdate\DailyWorkUpdate> $tl_employees_daily_work_updates
 * @property-read int|null $tl_employees_daily_work_updates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Vault\Vault> $vaults
 * @property-read int|null $vaults_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia {}
}

namespace App\Models\User\Employee{
/**
 * App\Models\User\Employee\Employee
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee withoutTrashed()
 */
	class Employee extends \Eloquent {}
}

namespace App\Models\User{
/**
 * App\Models\User\LoginHistory
 *
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginHistory withoutTrashed()
 */
	class LoginHistory extends \Eloquent {}
}

namespace App\Models\Vault{
/**
 * App\Models\Vault\Vault
 *
 * @property string|array $note
 * @property-read \App\Models\User|null $creator
 * @property mixed $password
 * @property mixed $username
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $viewers
 * @property-read int|null $viewers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Vault newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vault newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vault onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Vault query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vault withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Vault withoutTrashed()
 */
	class Vault extends \Eloquent {}
}

namespace App\Models\Weekend{
/**
 * App\Models\Weekend\Weekend
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend query()
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Weekend withoutTrashed()
 */
	class Weekend extends \Eloquent {}
}

