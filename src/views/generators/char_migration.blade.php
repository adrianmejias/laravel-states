use Illuminate\Database\Migrations\Migration;

class CharifyStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table(\Config::get('states.table_name'), function($table)
            {
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . \Config::get('states.table_name') . " MODIFY iso_3166_2 CHAR(2) NOT NULL DEFAULT ''");
            });
        }
	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::table(\Config::get('states.table_name'), function($table)
            {
                DB::statement("ALTER TABLE " . DB::getTablePrefix() . \Config::get('states.table_name') . " MODIFY iso_3166_2 VARCHAR(2) NOT NULL DEFAULT ''");
            });
	}

}