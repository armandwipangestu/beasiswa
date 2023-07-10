## Dependency

> **Catatan**:
>
> -   `Composer` disini berfungsi sebagai package manager untuk mendownload dependency dari `dompdf`.
>
> -   `Yarn` disini berfungsi sebagai package manager untuk mendownload dependency dari template `Stisla`.
>
> -   Untuk PHP, MySQL dan Apache bisa di install dengan bundle seperti `XAMPP` / `MAMP` / `LAMP`
>
> -   `Git` berfungsi untuk melakukan clone atau mendownload repository ini

-   [Composer](https://getcomposer.org/download/)
-   [Yarn](https://yarnpkg.com/)
-   [PHP 5 ~ 8.0](https://www.php.net/releases/8.0/en.php)
-   [MySQL 5.1+](https://downloads.mysql.com/archives/community/)
-   [Apache](https://httpd.apache.org/)
-   [Git](https://git-scm.com/downloads)

### Cara install

-   Clone atau download repository ini:

```sh
git clone https://github.com/armandwipangestu/beasiswa.git
```

-   Membuat file `.env.development` dan foler `img/profile`

```sh
cd beasiswa
```

```sh
cp .env.example .env.development
```

> **Catatan**:
>
> Sesuaikan isian .env.development dengan konfigurasi anda (seperti nama database dll)
>
> Default yang saya gunakan:
> ```
> DB_HOSTNAME=localhost
> DB_USERNAME=root
> DB_PASSWORD=
> DB_NAME=beasiswa
> ```
-   Install dependencies dompdf

```sh
composer update
```

-   Install dependencies template stisla

```sh
cd template/stisla
```

```sh
yarn
```

```sh
yarn dist
```

-   Import Database

    -   Membuat database baru dengan nama `beasiswa`

        ![image](https://github.com/armandwipangestu/beasiswa/assets/64394320/1d206dfe-72ca-41c9-86be-370f5bb82ac4)

    -   Import `beasiswa/database/beasiswa.sql` ke dalam database melalui phpmyamdin

        ![image](https://github.com/armandwipangestu/beasiswa/assets/64394320/b24c8e8c-18b1-41a5-a73d-f54024346b1d)
        ![image](https://github.com/armandwipangestu/beasiswa/assets/64394320/704ca427-bd6d-4f23-93e9-0767b3b11868)
        ![image](https://github.com/armandwipangestu/beasiswa/assets/64394320/22947ae4-b346-45a5-bd38-cbea86c21c31)

-   Membuka program

Buka url `localhost/beasiswa` maka program akan muncul seperti berikut ini

![image](https://github.com/armandwipangestu/beasiswa/assets/64394320/f8bf341d-5db4-4320-8acc-4b04d4fa7f0f)

Untuk login dapat membuat akun sendiri atau menggunakan akun berikut ini:

-   Role Admin

    -   Email: admin@admin.com
    -   Password: 123

    ![image](https://github.com/armandwipangestu/beasiswa/assets/64394320/ef82c78c-2fff-410a-949d-a66670a2641d)

-   Role User

    -   Email: user@user.com
    -   Password: 123

    -   Email: user2@user2.com
    -   Password: 123

    ![image](https://github.com/armandwipangestu/beasiswa/assets/64394320/90203ade-ac40-4fb2-90d7-e4e09a2d34f8)

- Role Master

    -   Email: master@master.com
    -   Password: 123

    ![image](https://github.com/armandwipangestu/beasiswa/assets/64394320/da64be8e-3fcf-406d-8717-03878956d292)

### ERD (Entity Relationship Diagram)

![image](erd/tabel_keseluruhan.png)

Untuk melihat ERD dari program ini, kunjungi halaman berikut ini [whimsical.com/tabel-keseluruhan](https://whimsical.com/tabel-keseluruhan-UbTUmg9vvBiZaeJ61G8pQR)

### Penjelasan Role

- `Admin`

    Role ini dapat mengatur (menambah, menghapus, mengubah) role akses, role user, jurusan, kelas program, menu management, submenu management, status hidup, status hubungan, status pendidikan, status pekerjaan.

    Singkatnya role ini yang bertanggung jawab untuk data data yang mempunyai relasi.

- `User`

    Role ini hanya dapat mengisikan dokumen beasiswa sebagai syarat untuk mengajukan beasiswa, dokumen beasiswa ini mencakup dokumen biodata user, prestasi, data keluarga.

    Dokumen - dokumen tersebut akan menjadi bahan penilaian dalam pengecekan dokumen untuk diterima atau ditolak nya beasiswa oleh role `Master`.

- `Master`

    Role ini dapat mem-filter dokumen beasiswa yang diajukan, di role inilah dokumen beasiswa akan dicek. Kemudian nantinya dokumen tersebut akan dikembalikan ke role `User` dengan status diterima atau ditolak.