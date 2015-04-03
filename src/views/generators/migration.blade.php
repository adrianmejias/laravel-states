use Illuminate\Database\Migrations\Migration;

class SetupStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Creates the users table
		Schema::create(\Config::get('states.table_name'), function($table)
		{		    
		    $table->integer('id')->index();
		    $table->string('iso_3166_2', 2)->default('');
		    $table->string('name', 255)->default('');
		    
		    $table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop(\Config::get('states.table_name'));
	}

}