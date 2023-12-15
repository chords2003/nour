<?php

test('that true is true', function () {
    expect(true)->toBeTrue();
});




it('shows the homepage', function () {

  $response = get('/');

  $response->assertStatus(200);

});


