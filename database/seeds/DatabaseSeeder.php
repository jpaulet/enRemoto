<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use App\Enterprise;
use App\Job;
use App\Tag;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::create([
            'name' => 'User1',
            'email' => 'user1@user.com',
            'password' => bcrypt('user'),
            'enterprise_id' => null
        ]);

        User::create([
            'name' => 'Enterprise',
            'email' => 'enterprise@enterprise.com',
            'password' => bcrypt('admin')
        ]);

        Category::create([
            'name' => 'Desarrollo de Software'
        ]);

        Category::create([
            'name' => 'Gestión'
        ]);

        Tag::create([
            'name' => 'PHP'
        ]);

        Tag::create([
            'name' => 'dev'
        ]);

        Enterprise::create([
            'logo' => '/img/logo1.png',
            'name' => 'Enterprise 1',
            'description' => 'Stack Overflow is the largest, most trusted online community for developers to learn, share their knowledge, and build their careers. More than 50 million professional and aspiring programmers visit Stack Overflow each month to help solve coding problems, develop new skills, and find job opportunities.',
            'location' => 'Barcelona, Gran Via nº 50',
            'link' => 'http://enterprise.com',
            'validated' => false,
            'user_id' => 2
        ]);

        Job::create([
            'title' => 'PHP developer',
            'position' => 'Senior developer',
            'tags' => 'php dev frontend',
            'salary' => '+30K',
            'type' => 'Full time',
            'link' => 'http://www.company.com/link',
            'enterprise_id' => '1',
            'category_id' => '1',
            'description' => 'Come help us create the future of Stack Overflow. We\'re looking for creative developers who are excited about building tools to support the growth of our company from within, with a special focus on tools for our growing sales team. Some projects we\'ve been working on:
                                - Live-updating status dashboards displayed in every office and used by the sales team to monitor sales and view progress towards sales goals
                                - Backend and Frontend systems that control sales, fulfillment, billing, and accounting
                                - Integrations with different third-party APIs used to support a wide array of internal business needs
                                - Building and maintaining public facing properties used by developers, the sales team and our B2B user base like the annual Stack Overflow Survey and stackoverflowbusiness.com
                              As a developer on our internal dev team, you\'ll work primarily in our main stack of C#, ASP.NET, and MSSQL Server, with supporting technologies like Angular, TypeScript, React and Redis. You’ll also have the opportunity to interact with a lot of third-party tools and APIs like Salesforce, Looker and Hubspot. We don\'t expect you to know everything coming in, so we\'ll pair you with mentors who will help you learn and develop. ',
            'promoted' => false                             
        ]);


    }

}
