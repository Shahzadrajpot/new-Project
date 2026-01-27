<?php

namespace App\Http\Controllers;

use App\Models\talent;
use App\Models\feed;
use App\Models\Client;
use App\Models\Task;
use App\Models\Skill;
use App\Models\Language;
use App\Models\City;
use App\Models\Contact;
use App\Models\Dashboard;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function dashboard()
    {
        $dashboards = Dashboard::all();
        $totalTalents = talent::count();
        $totalTasks = Task::count();
        $totalClients = Client::count();

        return view('dashboard', compact(['dashboards', 'totalTalents', 'totalTasks', 'totalClients']));
    }
    public function index(Request $request)               // talents function
    {
        $query = talent::query();
        $date = $request->date;
        // dd($query);
        if ($request->search) {
            $query->where('client', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%');
            //   ->orWhere('date','like','%'.$request->search.'%');

        }

        if (!empty($request->status)) {
            $query->where('status', $request->status);
        }
        if (!empty($date == 'asc')) {
            $query->orderBy('id', 'ASC');
        } elseif (!empty($date == 'desc')) {
            $query->orderBy('id', 'DESC');
        }
        $talents = $query->paginate(10);
        return view('talent', compact('talents'));
    }
    public function clients(Request $request)
    {
        $query = client::query();

        if ($request->search) {                      // search by name ,id,

            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->orWhere('date', 'like', '%' . $request->search . '%');
        }

        if (!empty($request->status)) {                         // status filter
            $query->where('status', $request->status);
        }
        $date = $request->date;                           // date filter
        if (!empty($date == 'asc')) {
            $query->orderBy('id', 'ASC');
        } elseif (!empty($date == 'desc')) {
            $query->orderBy('id', 'DESC');
        }


        $clients = $query->paginate(10);

        return view('clients', compact('clients'));
    }
    public function feed(Request $request)
    {
        $query = feed::query();
        $date = $request->date;
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                //  ->orWhere('talent','like','%'.$request->search.'%')
                ->orWhere('type', 'like', '%' . $request->search . '%')
                ->orWhere('jobs', 'like', '%' . $request->search . '%');
            //  ->orWhere('date','like','%'.$request->search.'%');
        }

        if (!empty($date == 'asc')) {
            $query->orderBy('id', 'ASC');
        } elseif (!empty($date == 'desc')) {
            $query->orderBy('id', 'DESC');
        }
        $feeds = $query->paginate(10);
        return view('feed', compact('feeds'));
    }
    public function tasks(Request $request)
    {
        $query = task::query();
        if ($request->search) {                         // search by task_name , assigned_to , priority , status
            $query->where('skill', 'like', '%' . $request->search . '%')
                ->orWhere('client_name', 'like', '%' . $request->search . '%')
                ->orWhere('talent_name', 'like', '%' . $request->search . '%')
                ->orWhere('status', 'like', '%' . $request->search . '%')
                ->orWhere('date', 'like', '%' . $request->search . '%');
        }


        if (!empty($request->status)) {
            $query->where('status', $request->status);
        }
        $date = $request->date;
        if (!empty($date == 'asc')) {
            $query->orderBy('id', 'ASC');
        } elseif (!empty($date == 'desc')) {
            $query->orderBy('id', 'DESC');
        }

        $tasks = $query->paginate(10);
        // $tasks = task::paginate(10);
        $totalTasks = Task::count();

        return view('tasks', compact('tasks', 'totalTasks'));
    }
    public function skill(Request $request)
    {
        $query = Skill::query();
        if ($request->search) {
            $query->where('skill_name', 'like', '%' . $request->search . '%')
                ->orWhere('created_at', 'like', '%' . $request->search . '%')
                ->orWhere('updated_at', 'like', '%' . $request->search . '%');
        }
        $date = $request->date;
        if (!empty($date == 'asc')) {
            $query->orderBy('id', 'ASC');
        } elseif (!empty($date == 'desc')) {
            $query->orderBy('id', 'DESC');
        }

        $skills = $query->paginate(10);

        return view('skill', compact('skills'));
    }
    public function languages(Request $request)
    {
        $query = Language::query();
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('created_at', 'like', '%' . $request->search . '%')
                ->orWhere('updated_at', 'like', '%' . $request->search . '%');
        }
        $date = $request->date;
        if (!empty($date == 'asc')) {
            $query->orderBy('id', 'ASC');
        } elseif (!empty($date == 'desc')) {
            $query->orderBy('id', 'DESC');
        }
        $languages = $query->paginate(10);


        return view('languages', compact('languages'));
    }
    public function cities(Request $request)
    {
        $query = City::query();
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('created_at', 'like', '%' . $request->search . '%')
                ->orWhere('updated_at', 'like', '%' . $request->search . '%');
        }
        $date = $request->date;
        if (!empty($date == 'asc')) {
            $query->orderBy('id', 'ASC');
        } elseif (!empty($date == 'desc')) {
            $query->orderBy('id', 'desc');
        }
        // $cities = cities::paginate(1);
        $cities = $query->paginate(10);

        return view('cities', compact('cities'));
    }
    public function contact_us(Request $request)
    {
        $query = Contact::query();
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('submitted_by', 'like', '%' . $request->search . '%')
                ->orWhere('created_at', 'like', '%' . $request->search . '%');
        }
        $date = $request->date;
        if (!empty($date == 'asc')) {
            $query->orderBy('id', 'ASC');
        } elseif (!empty($date == 'desc')); {
            $query->orderBy('id', 'DESC');
        }
        $contact_us = $query->paginate(10);
        return view('contact_us ', compact('contact_us'));
    }
    public function login()
    {

        return view('login');
    }
    public function register()
    {
        return view('register');
    }
    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('/clients')->with('success', 'Admin Login successful.');
            }
            return redirect('dashboard')->with('success', 'Login successful.');
        } else {
            return back()->with('error', 'Invalid email or password.');
        }
    }
    public function registerUser(Request $request)
    {
        $newUser = new User();
        $newUser->name = $request->input('name');
        $newUser->email = $request->input('email');
        $newUser->password = bcrypt($request->input('password'));
        // $newUser->type = 'customer';
        $newUser->save();
        if ($newUser->save()) {
            return redirect('/login')->with('success', 'Registration successful. Please login.');
        } else {
            return redirect('/register')->with('error', 'Registration failed. Please try again.');
        }
        return view('register');
    }

    public function logout()
    {

        Auth::logout();              // Logout the authenticated user
        return Redirect('login');
    }
    // destroy function for dell data from the tables
    public function destroy($id)             //delete a row function using id
    {
        $client = Client::find($id);
        if ($client) {
            $client->delete();
            return redirect()->back()->with('success', 'Client deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Client not found.');
        }
    }
    public function destroy_talent($id)
    {       // talent de3stroy
        $talent = talent::find($id);
        if ($talent) {
            $talent->delete();
            return redirect()->back()->with('success', 'Talent deleted successfuly.');
        } else {
            return redirect()->back()->with('error', 'Talent not found.');
        }
    }
    public function destroy_feed($id)
    {                 // feed destroy
        $feed = feed::find($id);
        if ($feed) {
            $feed->delete();
            return redirect()->back()->with('success', 'feed deleted successfuly.');
        } else {
            return redirect()->back()->with('error', 'Feed not found.');
        }
    }

    public function destroy_task($id)
    {                 // task destroy
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return redirect()->back()->with('success', 'task deleted successfuly.');
        } else {
            return redirect()->back()->with('error', 'Task not found.');
        }
    }
    public function destroy_skill($id)
    {                 // skill destroy
        $skill = Skill::find($id);
        if ($skill) {
            $skill->delete();
            return redirect()->back()->with('success', 'skill deleted successfuly.');
        } else {
            return redirect()->back()->with('error', 'Skill not found.');
        }
    }
    public function destroy_language($id)
    {                 // language destroy
        $language = Language::find($id);
        if ($language) {
            $language->delete();
            return redirect()->back()->with('success', 'language deleted successfuly.');
        } else {
            return redirect()->back()->with('error', 'Language not found.');
        }
    }
    public function destroy_city($id)
    {                 // city destroy
        $city = City::find($id);
        if ($city) {
            $city->delete();
            return redirect()->back()->with('success', 'city deleted successfuly.');
        } else {
            return redirect()->back()->with('error', 'City not found.');
        }
    }
    public function destroy_contact($id)
    {                 // contact destroy
        $contact = Contact::find($id);
        if ($contact) {
            $contact->delete();
            return redirect()->back()->with('success', 'contact deleted successfuly.');
        } else {
            return redirect()->back()->with('error', 'Contact not found.');
        }
    }         // functions for single data view
    // public function view_task($id)
    // {         //  view single tast
    //     $task = Task::findOrFail($id);

    //     return view('/tasks/show_task', compact('task'));
    // }


    // public function view_client(Client $client)
    // {     //  view single client
    //     return view('single_client/show_client', compact('client'));
    // }
    public function show_task(Task $task)
    {
        return view('.common.show_single', [
            'title' => 'Task Details',
            'heading' => 'Task Details',
            'backUrl'  => url('/tasks'),
            'fields' => [
                'Task ID'   => $task->id,
                'Name'      => $task->name,
                'Description' => $task->description,
                'Status'    => ucfirst($task->status),
            ]
        ]);
    }

    public function show_client(Client $client)
    {
        return view('.common.show_single', [
            'title' => 'Client Details',
            'heading' => 'Client Details',
            'backUrl' => url('/clients'),
            'fields' => [
                'Client ID'   => $client->id,
                'Name'        => $client->name,
                'Phone'       => $client->phone,
                'Email'       => $client->email,
                'Status'      => ucfirst($client->status),
                'Date'        => $client->date,
            ]
        ]);
    }
    public function show_talent(talent $talent)                        // show single talent
    {
        return view('.common.show_single', [
            'title' => 'Talent Details',
            'heading' => 'Talent Details',
            'backUrl' => url('/talents'),
            'fields' => [
                'Talent ID'   => $talent->id,
                'Client'      => $talent->client,
                'Phone'       => $talent->phone,
                'Email'       => $talent->email,
                'Status'      => ucfirst($talent->status),
                // 'Date'        => $talent->date,
            ]
        ]);
    }
    public function show_feed(feed $feed)                        // show single feed
    {
        return view('.common.show_single', [
            'title' => 'Feed Details',
            'heading' => 'Feed Details',
            'backUrl' => url('/feed'),
            'fields' => [
                'Feed ID'   => $feed->id,
                'Name'      => $feed->name,
                'Talant'    => $feed->talant,
                'Type'      => $feed->type,
                'Jobs'      => $feed->jobs,
                'Date'        => $feed->date,
            ]
        ]);
    }
    public function show_skill(Skill $skill)                        // show single skill
    {
        return view('.common.show_single', [
            'title' => 'Skill Details',
            'heading' => 'Skill Details',
            'backUrl' => url('/skill'),
            'fields' => [
                'Skill ID'   => $skill->id,
                'Skill Name'      => $skill->skill_name,
                'Created At'    => $skill->created_at,
                'Updated At'      => $skill->updated_at,
            ]
        ]);
    }
    public function show_language(Language $language)                        // show single language
    {
        return view('.common.show_single', [
            'title' => 'Language Details',
            'heading' => 'Language Details',
            'backUrl' => url('/languages'),
            'fields' => [
                'Language ID'   => $language->id,
                'Name'      => $language->name,
                'Created At'    => $language->created_at,
                'Updated At'      => $language->updated_at,
            ]
        ]);
    }
    public function show_city(City $city)                        // show single city
    {
        return view('.common.show_single', [
            'title' => 'City Details',
            'heading' => 'City Details',
            'backUrl' => url('/cities'),
            'fields' => [
                'City ID'   => $city->id,
                'Name'      => $city->name,
                'Created At'    => $city->created_at,
                'Updated At'      => $city->updated_at,
            ]
        ]);
    }
    public function show_contact(Contact $contact)                        // show single contact
    {
        return view('.common.show_single', [
            'title' => 'Contact Details',
            'heading' => 'Contact Details',
            'backUrl' => url('/contact-us'),
            'fields' => [
                'Contact ID'   => $contact->id,
                'Name'      => $contact->name,
                'Email'      => $contact->email,
                'Submitted By'    => $contact->submitted_by,
                'Created At'    => $contact->created_at,
            ]
        ]);
    }
    // for creating talent
    public function create_talent()
    {
        return view('/talents/create_talent');
    }

    // for storing new talent
    public function store_talent(Request $request)
    {
        $request->validate([
            'client' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:talents',
            'status' => 'required|string|max:50',
        ]);
        talent::create([
            'client' => $request->client,
            'phone'  => $request->phone,
            'email'  => $request->email,
            'status' => $request->status,
            'date'   => $request->date,
        ]);
        return redirect('/talents.index')->with('success', 'New talent added successfully.');
        // return redirect()->route('talents.index')
            // ->with('success', 'Talent added successfully!');
    }
    public function create_client(){
        return view('/new_clients');
    }
    public function store_client(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:clients',
            'status' => 'required|string|max:50',

        ]);
        Client::create([
            'name' => $request->name,
            'phone'  => $request->phone,
            'email'  => $request->email,
            'status' => $request->status,
            'date'   => $request->date,
        ]);
        return redirect('/clients')->with('success', 'New client added successfully.');

    }

}



