php artisan crud:generate Students --fields='name#string;email#string' --form-helper=html

php artisan crud:generate Groups  --fields='user_id#bigint#unsigned;name#string'  --form-helper=html --foreign-keys="user_id#id#users#cascade"  --relationships="user#belongsTo#App\Models\User"

php artisan crud:generate Car  --fields='user_id#bigint#unsigned;name#string;color#string;price#integer'  --form-helper=html --foreign-keys="user_id#id#users#cascade"  --relationships="user#belongsTo#App\Models\User"

php artisan crud:generate Members  --fields='group_id#bigint#unsigned;user_id#bigint#unsigned'  --form-helper=html --foreign-keys="group_id#id#groups#cascade;user_id#id#students#cascade"  --relationships="group#belongsTo#App\Models\Group;student#belongsTo#App\Models\Student;"

php artisan crud:generate Schedules  --fields='user_id#bigint#unsigned;group_id#bigint#unsigned;note#string;start_at#datetime;end_at#datetime;'  --form-helper=html --foreign-keys="user_id#id#users#cascade;group_id#id#users#cascade;"  --relationships="user#belongsTo#App\Models\User;group#belongsTo#App\Models\User;"

php artisan crud:generate Presences  --fields='schedule_id#bigint#unsigned;user_id#bigint#unsigned;note#string;start_at#datetime;end_at#datetime;'  --form-helper=html --foreign-keys="schedule_id#id#schedules#cascade;user_id#id#schedules#cascade;"  --relationships="schedule#belongsTo#App\Models\Schedule;student#belongsTo#App\Models\Student;"

