<?php
 
 namespace Tests\Feature;
 use Illuminate\Foundation\Testing\DatabaseTransactions;
 use Tests\TestCase;
 use App\Models\Exam;
 
class ExamTest extends TestCase
{
    use DatabaseTransactions;

    public function test_store_exam()
    {
        $data = [
            'lesson_id'=>1, 
            'exam_type_id'=>3,
            'grade_id'=>2,        
        ];
        $response = $this->post('/api/school/exam/store', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('exams', $data);
    }
    public function test_update_exam()
    {
        $data = [
            'lesson_id'=>1, 
            'exam_type_id'=>3,
            'grade_id'=>2,        
        ];
        $response = Exam::factory()->create();
        $response = $this->put('/api/school/exam/update/'.$response->id, $data);
        $response->assertStatus(200);
    }
    public function test_get_exam_by_id()
    {
        $response = Exam::factory()->create();
        $response = $this->get('/api/school/exam/'.$response->id);
        $response->assertStatus(200);
    }
    public function test_get_exams()
    {
        $response = $this->get('/api/school/exam/exams');
        $response->assertStatus(200);
    }
    public function test_remove_exam()
    {
        $response = Exam::factory()->create();
        $response = $this->delete('/api/school/exam/remove/'.$response->id);
        $response->assertStatus(200);
    }

}