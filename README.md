### Dependency

-   yarn
-   php
-   mysql
-   git

### Cara install

-   Clone atau download repository ini:

```sh
git clone https://github.com/armandwipangestu/beasiswa.git
```

-   Install dependencies template stisla

```sh
cd beasiswa/template/stisla
```

```sh
yarn
```

```sh
yarn dist
```

-   Import Database

    -   Membuat database baru dengan nama `beasiswa`

        ![image](https://github.com/armandwipangestu/image/assets/64394320/57db8f23-0f82-4018-9b02-2e95bceaa437)

    -   Import `beasiswa/database/beasiswa.sql` ke dalam database melalui phpmyamdin

        ![image](https://github.com/armandwipangestu/image/assets/64394320/269ea39d-1495-43fe-8507-2a5f7a86d843)
        ![image](https://github.com/armandwipangestu/image/assets/64394320/2a4c1832-c9fc-4b98-80b0-36a5a14fb810)
        ![image](https://github.com/armandwipangestu/image/assets/64394320/b6401b1c-da21-4435-bbbc-08995aff35d4)

-   Membuka program

Buka url `localhost/beasiswa` maka program akan muncul seperti berikut ini

![image](https://github.com/armandwipangestu/image/assets/64394320/59403093-9a0f-4810-a8fb-100d90385f71)

Untuk login dapat membuat akun sendiri atau menggunakan akun berikut ini:

-   Role Admin

    -   Email: admin@admin.com
    -   Password: 123

    ![image](https://github.com/armandwipangestu/image/assets/64394320/a50ec89e-7724-4449-9367-b031fe0d44cb)

-   Role User

    -   Email: user@user.com
    -   Password: 123

    ![image](https://github.com/armandwipangestu/image/assets/64394320/c87c2fd2-1d31-4a5a-9835-ce3d7e5510d6)

### ERD (Entity Relationship Diagram)

![image](erd/tabel_user.png)

Penjelasan:

-   Tabel `user` dan tabel `user_role`:

    -   Jenis relasi: Many-to-One (Banyak-ke-Satu)
    -   Penjelasan: Setiap user hanya memiliki satu role, tetapi satu role dapat dimiliki oleh banyak user

-   Tabel `user_access_menu` dan tabel `user_role`:

    -   Jenis Relasi: Many-to-One (Banyak-ke-Satu)
    -   Penjelasan: Setiap entri dalam tabel `user_access_menu` terkait dengan satu role, tetapi satu role dapat memiliki banyak entri dalam tabel `user_access_menu`

-   Tabel `user_access_menu` dan tabel `user_menu`:

    -   Jenis relasi: Many-to-Many (Banyak-ke-Banyak)
    -   Penjelasan: Satu entri dalam tabel `user_access_menu` dapat terkait dengan banyak menu, sebaliknya satu menu dapat terkait dengan banyak entri dalam tabel `user_access_menu`

-   Tabel `user_sub_menu` dan tabel `user_menu` :

    -   Jenis relasi: Many-to-One (Banyak-ke-Satu)
    -   Penjelasan: Setiap submenu terkait dengan satu menu, tetapi satu menu dapat memiliki banyak submenu.
