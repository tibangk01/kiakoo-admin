<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Role;
use App\Models\User;
use App\Models\Work;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\Discount;
use App\Models\Employee;
use App\Models\Variation;
use App\Models\ModelHasRole;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AuditRepository;
use App\Repositories\TaxonRepository;
use App\Repositories\GenderRepository;
use App\Repositories\VoucherRepository;
use App\Repositories\DiscountRepository;
use App\Repositories\EmployeeRepository;
use Spatie\Permission\Models\Permission;
use App\Repositories\PromocodeRepository;
use App\Repositories\VariationRepository;
use App\Repositories\PermissionRepository;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use Gabievi\Promocodes\Facades\Promocodes;
use App\Models\Permission as ModelsPermission;
use Yadahan\AuthenticationLog\AuthenticationLog;
use App\Repositories\AuthenticationLogRepository;
use FrittenKeeZ\Vouchers\Exceptions\VoucherNotFoundException;
use FrittenKeeZ\Vouchers\Exceptions\VoucherAlreadyRedeemedException;

class TestsController extends Controller
{
    public function index()
    {
        // User::create([
        //     'email' => 'test@test.com',
        //     'user_type' => 1,
        //     'password' => Hash::make('password'),
        // ]);

        // dd((new PermissionRepository)->findWhereIdIn([1,2]));
        // return User::where('email', 'test@test.com')->where('user_type', 0)->first();

        //    $u = User::find(1);
        //     return $u->authentications;

        // return $u->employee->authorized_to_log_in;

        // $variation = Variation::find(15);

        // dd($variation->discount);

        // $dis = Discount::find(1);

        // dd($dis->discountable);

        dd((new DiscountRepository)->exists(78));


        //    return  Role::all();

        // $x = new UserRepository;
        // dd($x->employeeEmailUnique('tst@test.com'));

        // dd((new EmployeeRepository)->phoneNumberExists('+1 (809) 684-7934'));

        // $user = User::find(27);


        // dd(Promocodes::redeem('Test2'));

        // $c = (new PromocodeRepository)->codeQuantityReached('reached');

        // dd($c);



        // $product = Product::find(1);

        // return $product->createVouchers(2, [
        //     '7.00'
        // ], today()->addDays(7));

        // $c = Vouchers::generate('***-***-***', '123a4567890');

        // dd($c);

        // $codes = Vouchers::batch(10);

        // dd($codes);

        //    $d =   stringToDatetime('08/03/2020');

        //    dd($d);

        // $date = Voucher::all();

        // dd($date);

        // $c = (new TaxonRepository)
        //     ->whereTaxonNameBelongsToTaxonomy('ordinateur', 4);

        // dd($c);

        // $user = User::find(1);

        // try {
        //     Vouchers::redeem('KS-UBH7-M8NJ', $user, ['foo' => 'bar']);
        // } catch (VoucherNotFoundException $e) {
        //     dd("baba");
        //     // Code provided did not match any vouchers in the database.
        // } catch (VoucherAlreadyRedeemedException $e) {
        //     // Voucher has already been redeemed.
        //     dd("tapa");
        // }

        // $voucher = Vouchers::create();


        // dd((new VoucherRepository)->get());

        // $product = Product::find(5);

        // $user = User::find(1);

        // dd($product->vouchers);

        // $c= Voucher::find(5);

        // dd($c->metadata['fab']);

        // $c = Vouchers::withOwner($user)->create();

        // dd($c);

        // $c = $user->associatedVouchers;

        // dd($c);

        // $voucher = Vouchers::withMetadata(['description' => 'Je suis la description'])->create(1);


        // $c = Vouchers::withCharacters('fadefezfezf')->create(2);

        // dd($c);

        // $c = Vouchers::withMetadata(['fab' => 'lorem'])->create();
        // dd($c);

        // $interval = DateInterval::createFromDateString('4 day');
        // // dd($interval);

        // $c = Vouchers::withStartTimeIn($interval)->create();
        // dd($c);

        // $product = Product::find(5);

        // // dd($product);

        // $c = Vouchers::withEntities($product)->create();

        // dd($c);

        // try {
        //     $success = Vouchers::redeem('GNAE-ELZT', $user, ['foo' => 'bar']);
        //     dd($success);
        // } catch (VoucherNotFoundException $e) {
        //     // Code provided did not match any vouchers in the database.
        //     dd("dada");
        // } catch (VoucherAlreadyRedeemedException $e) {
        //     // Voucher has already been redeemed.
        //     dd("ddd");
        // }

        // $voucher = Vouchers::create();

        // dd($voucher);

        // $employee = Employee::find(31);

        // return $employee->user->roles->pluck('id');
        // dd((new UserRepository)->emailExists('tibangkolani@gmail.com'));
        // Notification::send(auth()->user(), new PasswordChangedNotification());

        // $s = Hash::make("azertyuiop");
        // $u = User::whereId(22)->first()->password;

        // $re = Hash::check("azeryuiop", $u);

        // $u = User::whereId(13)->first();
        // $u->update([
        //    'email' => 'amio@d.csm',
        //    'name' => 'es',
        //    'password' => 'ama'
        //  ]);

        //  $u = ActivityLog::find(1);
        //  dd($u->load('activitable'));

        // $d = User::find(1);

        // return $d->assignRole('administrateur');

        // return   $d->load([
        //     'user.roles.permissions',
        //     'employee.work',
        //     'employee.human.civility'
        // ]);

        // return Role::create(['name' => 'testeur']);
        // $permission = Permission::create(['name' => 'gerer_les_utilisateurs']);

        // dd(Auth::user());

        // $q = (new EntityTypeRepository)->legalPerson();

        // dd($q);

        // $entity = Entity::create([
        //     'entity_type_id' => (new EntityTypeRepository)->physical(),
        // ]);

        // $human = Human::create([
        //     'entity_id' => 3,
        //     'human_type_id' => (new HumanTypeRepository)->employee(),
        //     'civility_id' => 1,
        //     'first_name' => 'fabien',
        //     'last_name' => 'komlani',
        //     'phone_number' => '98068789'
        // ]);

        // $employee = Employee::create([
        //     'human_id' => 2,
        //     'employee_type_id' => (new EmployeeTypeRepository)->regular(),
        //     'work_id' => 1,
        //     'status' => 0,
        // ]);

        // $temp_password = (new PasswordService)->randomAlphaNumeric();

        // $user = User::create([
        //     'email' => 'f@f.com',
        //     'password' => Hash::make($temp_password),
        //     'temp_password' => $temp_password,
        // ]);

        // $regularEmployee = RegularEmployee::create([
        //     'user_id' => 26,
        //     'employee_id' => 4
        // ]);

        // $contact  = Contact::create([
        //     'value' => '99090990',
        // ]);

        // $human = Human::find(23);

        // $human->contacts()->save($contact);

        //    $t = RegularEmployee::find(25);

        //    return $t->load([
        //        'user.roles',
        //        'employee.work',
        //        'employee.human.civility.gender',
        //        'employee.human.contact',
        //        'employee.human.address',
        //    ]);

    }

    public function store(Request $req)
    {
        dd('done');
    }
}
