<?php

function cek_sudah_masuk()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        // use role_id based on database
        $email = $ci->session->userdata('email');
        $role_id = $ci->db->query("SELECT `user_data`.`role_id` FROM `user_data` WHERE `user_data`.`email` = '$email'")->row_array();

        // use role_id based on session
        // $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id['role_id'],
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function cek_akses($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}

function hari_indonesia($timestamp)
{
    $day = date('l', $timestamp);

    if ($day == "Sunday") {
        return "Minggu, " . date('d/m/Y', $timestamp);
    }

    if ($day == "Monday") {
        return "Senin, " . date('d/m/Y', $timestamp);
    }

    if ($day == "Tuesday") {
        return "Selasa, " . date('d/m/Y', $timestamp);
    }

    if ($day == "Wednesday") {
        return "Rabu, " . date('d/m/Y', $timestamp);
    }

    if ($day == "Thursday") {
        return "Kamis, " . date('d/m/Y', $timestamp);
    }

    if ($day == "Friday") {
        return "Jumat, " . date('d/m/Y', $timestamp);
    }

    if ($day == "Saturday") {
        return "Sabtu, " . date('d/m/Y', $timestamp);
    }
}

function bulan_indonesia($timestamp)
{
    $month = date('m', $timestamp);

    if ($month == "01") {
        return date('d', $timestamp) . " Januari " . date("Y", $timestamp);
    }

    if ($month == "02") {
        return date('d', $timestamp) . " Februari " . date("Y", $timestamp);
    }

    if ($month == "03") {
        return date('d', $timestamp) . " Maret " . date("Y", $timestamp);
    }

    if ($month == "04") {
        return date('d', $timestamp) . " April " . date("Y", $timestamp);
    }

    if ($month == "05") {
        return date('d', $timestamp) . " Mei " . date("Y", $timestamp);
    }

    if ($month == "06") {
        return date('d', $timestamp) . " Juni " . date("Y", $timestamp);
    }

    if ($month == "07") {
        return date('d', $timestamp) . " Juli " . date("Y", $timestamp);
    }

    if ($month == "08") {
        return date('d', $timestamp) . " Agustus " . date("Y", $timestamp);
    }

    if ($month == "09") {
        return date('d', $timestamp) . " September " . date("Y", $timestamp);
    }

    if ($month == "10") {
        return date('d', $timestamp) . " Oktober " . date("Y", $timestamp);
    }

    if ($month == "11") {
        return date('d', $timestamp) . " November " . date("Y", $timestamp);
    }

    if ($month == "12") {
        return date('d', $timestamp) . " Desember " . date("Y", $timestamp);
    }
}
