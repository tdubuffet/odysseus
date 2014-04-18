<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->customRepositoryClassName = 'Odysseus\UserBundle\Entity\UserRepository';
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'type' => 'integer',
   'id' => true,
   'columnName' => 'id',
  ));
$metadata->mapField(array(
   'columnName' => 'idCountry',
   'fieldName' => 'idCountry',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'firstname',
   'fieldName' => 'firstname',
   'type' => 'string',
   'length' => '50',
  ));
$metadata->mapField(array(
   'columnName' => 'lastname',
   'fieldName' => 'lastname',
   'type' => 'string',
   'length' => '50',
  ));
$metadata->mapField(array(
   'columnName' => 'mail',
   'fieldName' => 'mail',
   'type' => 'string',
   'length' => '150',
  ));
$metadata->mapField(array(
   'columnName' => 'password',
   'fieldName' => 'password',
   'type' => 'string',
   'length' => '55',
  ));
$metadata->mapField(array(
   'columnName' => 'salt',
   'fieldName' => 'salt',
   'type' => 'string',
   'length' => '5',
  ));
$metadata->mapField(array(
   'columnName' => 'area',
   'fieldName' => 'area',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'permissionCode',
   'fieldName' => 'permissionCode',
   'type' => 'string',
   'length' => '3',
  ));
$metadata->mapField(array(
   'columnName' => 'lang',
   'fieldName' => 'lang',
   'type' => 'string',
   'length' => '3',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);