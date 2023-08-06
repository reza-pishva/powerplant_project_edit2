<?php
 
 namespace Tests\Feature;
 use Illuminate\Foundation\Testing\DatabaseTransactions;
 use Tests\TestCase;
 use App\Models\ClassRoom;
 
class ClassroomTest extends TestCase
{
    use DatabaseTransactions;

    public function test_store_class()
    {
        $data = [
            'year'=>'1402',  
            'name'=>'test',
            'grade_id'=>'1',        
        ];
        $response = $this->post('/api/school/classroom/store', $data);
        $response->assertStatus(201);
        $this->assertDatabaseHas('class_rooms', $data);
    }
    public function test_update_class()
    {
        $data = [
            'year'=>'1402',  
            'name'=>'test',
            'grade_id'=>'1',        
        ];
        $response = ClassRoom::factory()->create();
        $response = $this->put('/api/school/classroom/update/'.$response->id, $data);
        $response->assertStatus(200);
    }
    public function test_get_class_by_id()
    {
        $response = ClassRoom::factory()->create();
        $response = $this->get('/api/school/classroom/'.$response->id);
        $response->assertStatus(200);
    }
    public function test_get_classes()
    {
        $response = $this->get('/api/school/classroom/classrooms');
        $response->assertStatus(200);
    }
    public function test_get_current_classes()
    {
        $response = $this->get('/api/school/classroom/current-classrooms');
        $response->assertStatus(200);
    }
    public function test_get_class_students()
    {
        $response = $this->get('/api/school/classroom/class-students/1');
        $response->assertStatus(200);
    }
    public function test_get_class_teachers()
    {
        $response = $this->get('/api/school/classroom/class-teachers/1');
        $response->assertStatus(200);
    }
    public function test_remove_class()
    {
        $response = ClassRoom::factory()->create();
        $response = $this->delete('/api/school/classroom/remove/'.$response->id);
        $response->assertStatus(200);
    }

}