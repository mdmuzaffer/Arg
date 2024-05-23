<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use DB;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Carbon\Carbon;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Sortable;

    public $sortable = ['id', 'name', 'email', 'created_at', 'status'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_no',
        'role',
        'provider_name',
        'profile_complete',
        'device_token',
        'device_type',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
/*    public function products()
    {
        return $this->hasMany(Product::class);
    }*/


    // give permission
    public function getAllPermissions(array $permissions){
        return Permission::whereIn('permission_slug',$permissions)->get(); // old
       //return UsersPermission::whereIn('role_id',$permissions)->get();

    }

    // check has permission
    public function hasPermission($permission){

       return (bool) $permission = Permission::where('permission_slug', $permission)->count();

        //return (bool)$this->permissions->where('slug',$permission->slug)->count(); // this is old

    }

    
    public function the_role()
    {
        return $this->belongsTo(Role::class,'role');
    }


    // check has role
    public function hasRole(...$roles){

        foreach ($roles as $role) {
            if($this->roles->contains('role_name',$role)){
                return true;
            }
        }
        return false;
    }

    public function hasPermissionTo($permission){
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }


    public function hasPermissionThroughRole($permissions){
        foreach ($permissions->roles as $role) {
            if($this->roles->contains($role)){
                return true;
            }
        }
        return false;
    }

    public function givePermissionTo(... $permissions){ 

        $permissions = $this->getAllPermissions($permissions);
        if($permissions === null) {
            $this->permissions()->saveMany($permissions);
        }
        return $this;
    }

    public function usersPermissions(){
        //return $this->belongsTomany(Permission::class,'users_permissions');
        //return $this->belongsTomany(usersPermissions::class);
        return $this->belongsToMany(Role::class, 'users_permissions', 'permission_id', 'role_id');
    }


    public function roles()
    {
        //return $this->belongsTomany(Role::class,'users_roles');
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }

    public function permissions()
    {
        //return $this->belongsToMany(Permission::class, 'users_permissions');
        return $this->belongsToMany(Permission::class, 'users_permissions', 'role_id', 'permission_id');
    }

    public function userDetails()
    {
        return $this->hasOne(PatientProfile::class)->selectRaw('patient_profiles.*, "https://arogyadhamaapp.sdnaprod.com" as websiteUrl');

    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    
    // Now state added menu in input field so it removed 
    /*public function state()
    {
        return $this->hasOne(State::class);
    }*/

    public function country()
    {
        return $this->hasOne(Country::class);
    }

    public function language(){
        return $this->hasOne(Language::class);
    }

    public function accommodation(){
        return $this->hasOne(Accommodation::class);
    }

    public function department(){
        return $this->hasOne(Department::class);
    }


    // public function section(){
    //     return $this->hasOne(Section::class);
    // }


    public function sections(){
        //return $this->hasOne(UserSectionsMaping::class, 'user_id')->where('is_active','1');
        return $this->belongsToMany(Section::class, 'user_sections_mapings', 'user_id', 'section_id')->where('is_active', '1');
    }

    public function sectionMaping(){
        return $this->hasOne(UserSectionsMaping::class, 'user_id')->where('is_active','1');
        //return $this->hasMany(UserSectionsMaping::class, 'user_id')->where('is_active','1');
    }

    public function prescription()
    {
        return $this->hasMany(UserTreatmentPdfupload::class);
    }

    public function dailychart(){
        return $this->hasMany(DailyChart::class);
    }

    public function dietchart(){
        return $this->hasMany(DietChart::class,'department_id');
    }

    public function uservisit(){
         return $this->hasOne(UserVisit::class, 'patient_id')->where('status','1');
    }

    // date 16 may
    
    public function therapies()
    {
        return $this->hasMany(UserTreatment::class);
    }

    public function doctorTherapies()
    {
        return $this->hasMany(UserTreatment::class, 'doctor_id');
    }

    public function internTherapies()
    {
        return $this->hasMany(UserTreatment::class, 'intern_id');
    }

    public function appNotifications()
    {
        return $this->hasMany(AppNotification::class, 'receiver_id')->orderBy('id', 'desc');
    }

    public function dailyDietSchedules()
    {
        return $this->hasMany(UserDailyDietSchedule::class);
    }

    public function UserDeviceToken(){

        return $this->hasOne(UserDeviceToken::class)->select('id','user_id','device_type','notification_ison');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function intern()
    {
        return $this->hasOne(Intern::class);
    }


    public function scopeSearch($query, $filter)
    {
        if(!empty($filter)){

            if(isset($filter['patient-status']) && $filter['patient-status'] !=""){
                $query->where('status', $filter['patient-status']);
            }


           /* if(isset($filter['section-status']) && $filter['section-status'] !=""){
                $query->whereHas('sections', function ($query) use($filter){
                    $query->where('sections.status', $filter['section-status']);
                });
            }*/


            if(isset($filter['section-status']) && $filter['section-status'] !=""){
                $query->whereHas('sectionMaping', function ($query) use($filter){
                    $query->where('status', $filter['section-status']);
                });
            }


            if(isset($filter['section']) && $filter['section'] !=""){
                $query->whereHas('sections', function ($query) use($filter){
                    $query->where('section_id', $filter['section']);
                });
            }

            if(isset($filter['search']) && $filter['search'] !=""){
                $query->where(function ($query) use($filter) {
                    $query->where('name', 'like', '%' . $filter['search'] . '%')
                        ->orWhere('email', 'like', '%' . $filter['search'] . '%');
                });
            }
            
        }
        return $query;
    }



    public function scopeFilterByDateRange($query, $startDate, $endDate)
    {
        if(isset($startDate['start_date']) && $startDate['start_date']!="" ){
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        if(isset($startDate['end_date']) && $startDate['end_date']!="" ){
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        return $query;

    }



}
