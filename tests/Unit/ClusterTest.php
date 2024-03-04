<?php

use App\Models\Cluster;

use function Pest\Laravel\assertDatabaseHas;

test('can create cluster', function () {

    Cluster::create([
        'name' => 'clusterTest'
    ]);

    assertDatabaseHas(
        'clusters',
        [
            'id' => 1,
            'name' => 'Clustertest'
        ]
    );

});
