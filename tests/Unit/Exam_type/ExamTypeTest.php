<?php
 
 namespace Tests\Feature;
 use Illuminate\Foundation\Testing\DatabaseTransactions;
 use Tests\TestCase;
 use App\Models\ExamType;
 
class ExamTypeTest extends TestCase
{
    use DatabaseTransactions;
    public function test_store_exam_type()
    {
        $data = [
            'exam_type'=>'test',    
        ];
        $response = $this->post('/api/school/exam/exam-type/store', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('exam_types',$data);
    }
    public function test_update_exam_type()
    {
        $data = [
            'exam_type'=>'test',    
        ];
        $response = ExamType::factory()->create();
        $response = $this->put('/api/school/exam/exam-type/update/'.$response->id, $data);
        $response->assertStatus(200);
    }
    public function test_get_exam_type_by_id()
    {
        $response = ExamType::factory()->create();
        $response = $this->get('/api/school/exam/exam-type/'.$response->id);
        $response->assertStatus(200);
    }
    public function test_get_exams_type()
    {
        $response = $this->get('/api/school/exam/exam-types');
        $response->assertStatus(200);
    }
    public function test_remove_exam_type()
    {
        $response = ExamType::factory()->create();
        $response = $this->delete('/api/school/exam/exam-type/remove/'.$response->id);
        $response->assertStatus(200);
    }

}