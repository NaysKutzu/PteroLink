<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Settings;
use Mockery;

class SettingsTest extends TestCase
{
    /**
     * Test if the getSetting method returns the expected value.
     *
     * @return void
     */
    public function testGetSetting()
    {
        $settingKey = 'def_coins';
        $expectedValue = '200';
    
        $settingsMock = Mockery::mock(Settings::class);
        $settingsMock->shouldReceive('getSetting')
            ->once()
            ->with($settingKey)
            ->andReturn($expectedValue);
    
        // Replace the actual Settings class with the mocked instance
        $this->app->instance(Settings::class, $settingsMock);
    
        // Call the getSetting method
        $actualValue = Settings::getSetting($settingKey);
    
        // Make assertions
        $this->assertEquals($expectedValue, $actualValue);
    }
    
    

    /**
     * Clean up after each test.
     */
    protected function tearDown(): void
    {
        // Ensure that Mockery expectations are fulfilled
        //Mockery::close();
        Mockery::getContainer()->mockery_close();

    }
}
