<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

//test if the storage is public and the file is there
it('shows the image', function () {

  $response = $this->get('/test');

  $response->assertStatus(200);

});
