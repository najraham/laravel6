<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogsController extends Controller
{
    public function index() {
        if (Auth::user()->is_admin) {
            if (\request('tag')) {
                $blogs = Tag::where('name', \request('tag'))->firstOrFail()->blogs;
            }
            else {
                $blogs = Blog::latest()->get();
            }
        }
        else {
            if (\request('tag')) {
                $blogs = Tag::where('name', \request('tag'))->firstOrFail()->blogs;
            }
            else {
                $blogs = Blog::latest()->where('user_id', Auth::user()->id)->get();
            }

        }
        $tags = Tag::all();
        return view('pages.blog.index', ['blogs' => $blogs, 'tags' => $tags]);
    }

    public function show(Blog $blog) {
        return view('pages.blog.show', ['blog' => $blog]);
    }

    public function edit(Blog $blog) {
        return view('pages.blog.edit', ['blog' => $blog, 'tags'=> Tag::all()]);
    }

    public function update(Request $request, Blog $blog) {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required',
            'tags' => 'required'
        ]);

        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->excerpt = Str::words($blog->description, 10);

        $blog->save();

        $blog->tags()->detach();
        $blog->tags()->attach($request->tags);
        return redirect(route('show_blog', $blog->id));
    }

    public function add() {
        return view('pages.blog.add', ['tags'=> Tag::all()]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required',
            'tags' => 'required'
        ]);

        $color = ['red', 'blue', 'teal', 'orange', 'pink', 'yellow'];
        $class = ['bxl-dribbble', 'bx-file', 'bx-tachometer', 'bx-layer', 'bx-slideshow', 'bx-arch'];
        $svg_path_d = [
            'M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174',
            'M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426',
            'M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781',
            'M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813',
            'M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572',
        ];

        $blog = new Blog();

        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->excerpt = Str::words($blog->description, 10);
        $blog->icon_color = $color[array_rand($color)];
        $blog->class = $class[array_rand($class)];
        $blog->svg_path_d = $svg_path_d[array_rand($svg_path_d)];

        $blog->save();

        $blog->tags()->attach($request->tags);

        return redirect(route('show_blog', $blog->id));
    }

    public function delete(Blog $blog) {
        if($blog) {
            $blog->tags()->detach();
            $blog->delete();
        }
        return redirect(route('blogs_index'));
    }
}
