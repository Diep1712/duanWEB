<?php 
enum Enum {
public const GENDER_MALE = 1;
    public const GENDER_FEMALE = 0;
    public const GENDER_OTHER = 2;

    // ROLE
    public const ROLE_CUSTOMER = -1;
    public const ROLE_MANAGER = 1;
    // public const ROLE_NEWS = 2;
    // public const ROLE_SALE = 3;
    public const ADMIN = 4; // đại diện cho cả 3 admin 

    // STATUS ADMIN 
    public const ADMIN_STATUS_ACTIVE = 1;
    public const ADMIN_STATUS_RETIRED = 0;

}