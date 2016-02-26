use Illuminate\Database\Migrations\Migration;

class CodifyStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::table(\Config::get('states.table_name'), function($table)
            {
                $table->string('country_code')->default('US');
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
                $table->dropColumn('country_code');
            });
	}

}