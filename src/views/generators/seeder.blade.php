use Illuminate\Database\Seeder;

class StatesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the states table
        DB::table(\Config::get('states.table_name'))->delete();

        //Get all of the states
        $states = States::getList();
        foreach ($states as $stateId => $state){
            DB::table(\Config::get('states.table_name'))->insert(array(
                'id' => $stateId,
                'iso_3166_2' => $state['iso_3166_2'],
                'name' => $state['name'],
            ));
        }
    }
}