<?php
 
 namespace Tests\Feature;
 use Illuminate\Foundation\Testing\DatabaseTransactions;
 use Tests\TestCase;
 use App\databeses\factories\ProfileFactory;
 use App\Models\Profile;
 
class ProfileTest extends TestCase
{
    use DatabaseTransactions;
    public function test_store_profile()
    {
        $data = [
            'father_job'=>'test',
            'mother_job'=>'test',
            'father_phone_number'=>'123456',
            'mother_phone_number'=>'123456',
            'address'=>'test',
            'consideration'=>'test',
            'birthday'=>'11111111',
            'major'=>'test',
            'user_id'=>32,
        ];
        $response = $this->post('/api/school/profile/store', $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('profiles', $data);
    }
    public function test_update_profile()
    {
        $data = [
            'father_job'=>'test',
            'mother_job'=>'test',
            'father_phone_number'=>'123456',
            'mother_phone_number'=>'123456',
            'address'=>'test',
            'consideration'=>'test',
            'birthday'=>'11111111',
            'major'=>'test',
            'user_id'=>38,
        ];
        $response = Profile::factory()->create();
        $response = $this->put('/api/school/profile/update/'.$response->id, $data);
        $response->assertStatus(200);
    }
    public function test_get_profile_by_id()
    {
        $response = Profile::factory()->create();
        $response = $this->get('/api/school/profile/'.$response->id);
        $response->assertStatus(200);
    }
    public function test_get_profiles()
    {
        $response = $this->get('/api/school/profile/profiles');
        $response->assertStatus(200);
    }
    public function test_remove_profile()
    {
        $response = Profile::factory()->create();
        $response = $this->delete('/api/school/profile/remove/'.$response->id);
        $response->assertStatus(200);
    }
    public function test_get_user_profile()
    {
        $response = $this->get('/api/school/profile-user/5');
        $response->assertStatus(200);
    }
}