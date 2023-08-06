<?php
 
 namespace Tests\Feature;
 use Illuminate\Foundation\Testing\DatabaseTransactions;
 use Tests\TestCase;
 use App\databeses\factories\GradeFactory;
 use App\Models\Grade;
 
class GradeTest extends TestCase
{
    use DatabaseTransactions;

    public function test_store_grade()
    {
        $data = [
            'grade_name'=>'test',            
        ];
        $response = $this->post('/api/school/grade/store', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('grades', $data);
    }
    public function test_update_grade()
    {
        $data = [
            'grade_name'=>'test2',            
        ];
        $response = Grade::factory()->create();
        $response = $this->put('/api/school/grade/update/'.$response->id, $data);
        $response->assertStatus(200);
    }
    public function test_get_grade_by_id()
    {
        $response = Grade::factory()->create();
        $response = $this->get('/api/school/grade/'.$response->id);
        $response->assertStatus(200);
    }
    public function test_get_grades()
    {
        $response = $this->get('/api/school/grade/grades');
        $response->assertStatus(200);
    }
    public function test_remove_grade()
    {
        $response = Grade::factory()->create();
        $response = $this->delete('/api/school/grade/remove/'.$response->id);

        $response->assertStatus(200);
    }

}