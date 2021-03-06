<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TasksControllerTest extends TestCase
{
    /* Test PHPUnit */

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->action('GET', 'TasksController@index');
        $this->assertResponseOk();
    }

    public function testStore()
    {
        $this->visit('tasks/create')
	     ->type('TitleTest', 'title')
	     ->type('DescriptionTest', 'description')
	     ->press('Create New Task')
	     ->seePageIs('tasks');
	$this->assertRedirectedToRoute('tasks.index');
    }

    public function testShow()
    {
        $response = $this->action('GET', 'TasksController@show', ['tasks' =>5]);
        $this->assertResponseOk();
    }

    public function testEdit()
    {
        $response = $this->action('GET', 'TasksController@edit', ['tasks' =>5]);
        $this->assertResponseOk();
    }

    public function testUpdate()
    {
        $this->visit('tasks')
	     ->click('Edit Task')
	     ->type('TitleTestEdited', 'title')
	     ->type('DescriptionTestEdited', 'description')
	     ->press('Update Task')
	     ->seePageIs('tasks');
	$this->assertRedirectedToRoute('tasks.index');
    }

    public function testDestroy()
    {
	/* Sans avoir sélectionné une id précise*/
        $this->visit('tasks')
	     ->press('Delete this task?')
	     ->seePageIs('tasks');
	$this->assertRedirectedToRoute('tasks.index');
    }


}
