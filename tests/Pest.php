<?php

// Métodos de testing de Laravel
uses(\Tests\TestCase::class)->in('Feature');

// Migración de la base de datos para los tests
uses(\Illuminate\Foundation\Testing\RefreshDatabase::class)->in('Feature');


