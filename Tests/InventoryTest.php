<?php
    class InventoryTest extends \PHPUnit\Framework\TestCase{
        /** @group bdd */
        public function testRolesCanBeSet() {
            // Setup
            $mockRepo = $this->createMock(\App\RoleRepository::class);
            $inventory = new \App\Inventory($mockRepo);
            $mockRolesArray = [
                ['id' => 1, 'rolegamename' => 'maitre de guilde'],
                ['id' => 2, 'rolegamename' => 'officier'],
                ['id' => 3, 'rolegamename' => 'membre'],
                ['id' => 4, 'rolegamename' => 'recrue']
            ];
            $mockRepo->method('fetchRoles')->willReturn($mockRolesArray);
            $inventory->setRoles();
            $this->assertEquals('maitre de guilde', $inventory->getRoles()[0]['rolegamename']);
            $this->assertEquals('membre', $inventory->getRoles()[2]['rolegamename']);
        }
    }
?>