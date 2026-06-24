
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Mahasiswa::firstOrCreate(
    ['npm' => '5520122139'],
    ['nama' => 'Elvira', 'kelas' => 'IF-A', 'angkatan' => 2022]
);

User::firstOrCreate(
    ['email' => 'elvira@siakad.com'],
    [
        'name' => 'Elvira',
        'password' => Hash::make('password'),
        'role' => 'mahasiswa',
        'npm' => '5520122139'
    ]
);
echo "Mahasiswa created.\n";
