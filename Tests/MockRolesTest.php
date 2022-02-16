<?php
    use PHPUnit\Framework\TestCase;
    class MockRolesTest extends TestCase {
    /** @group bdd */
        public function testMockRolesAreReturned() {
            $mockRepo = $this->createMock(\App\RoleRepository::class);  //on crée la doublure de la classe RoleRepository qu'on a mis dans une variable
            $mockRolesArray = [
                ['id' => 1, 'rolegamename' => 'maitre de guilde'], // j'envoie ces données à la bdd 
                ['id' => 2, 'rolegamename' => 'officier'],
                ['id' => 3, 'rolegamename' => 'membre'],
                ['id' => 4, 'rolegamename' => 'recrue']
            ];
            $mockRepo->method('fetchRoles')->willReturn($mockRolesArray); // cette méthode (fonction d'une classe) devrait me renvoyer les données 
            $roles = $mockRepo->fetchRoles(); // cette variable récupèrera les données
            $this->assertEquals('maitre de guilde', $roles[0]['rolegamename']); //compare que l'id 1 (index 0)=  maître de guilde
        }
    }
?>
