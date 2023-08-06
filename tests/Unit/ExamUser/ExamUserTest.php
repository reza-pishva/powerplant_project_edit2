<?php
 
 namespace Tests\Feature;
 use Illuminate\Foundation\Testing\DatabaseTransactions;
 use Tests\TestCase;
 use App\Models\ExamUser;
 
class ExamUserTest extends TestCase
{
    use DatabaseTransactions;

    public function test_store_exam_user()
    {
        $data = [
            'score' => 19, 
            'date_shamsi' => 14020215,
            'user_id'=> 1,
            'exam_id'=> 1,        
        ];
        $response = $this->post('/api/school/user-exam/store', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('exam_users', $data);
    }
    public function test_update_exam()
    {
        $data = [
            'score'=>19.5, 
            'date_shamsi'=>14020215,
            'user_id'=>1,
            'exam_id'=>1,        
        ];
        $response = ExamUser::factory()->create();
        $response = $this->put('/api/school/exam-user/update/'.$response->id, $data);
        $response->assertStatus(200);
    }
    public function test_get_exam_user_by_id()
    {
        $response = ExamUser::factory()->create();
        $response = $this->get('/api/school/exam-user/user/'.$response->id);
        $response->assertStatus(200);
    }
    public function test_get_exams()
    {
        $response = $this->get('/api/school/exam-user/exams');
        $response->assertStatus(200);
    }
    public function test_remove_exam()
    {
        $response = ExamUser::factory()->create();
        $response = $this->delete('/api/school/exam-user/remove/'.$response->id);
        $response->assertStatus(200);
    }

}