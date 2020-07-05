<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    public static function get_all() {
        return DB::table('artikel')->get();
    }

    public static function insert($data) {
        // DB::beginTransaction();
        try {
            DB::table('artikel')
            ->insert([
                'judul' => $data['judul'],
                'isi' => $data['isi'],
                'slug' => Str::slug($data['judul'])
            ]);
            $artikel = DB::table('artikel')->orderBy("id", "DESC")->first();

            foreach ($data['tags'] as $value) {
                DB::table('artikel_tag')
                ->insert([
                    'artikel_id' => $artikel->id,
                    'tag_id' => $value
                ]);
            }
            // DB::commit();
            return "true";
        }catch(\Excetion $e) {
            // DB::rollback();
            return $e->getMessage();
        }
    }

    public static function find($id) {
        return DB::table('artikel')
        ->select('artikel.id', 'artikel.judul', 'artikel.slug', 'artikel.isi', DB::raw('GROUP_CONCAT(tag.nama) as tags'))
        ->join('artikel_tag', 'artikel.id', '=', 'artikel_tag.artikel_id', 'left')
        ->join('tag', 'tag.id', '=', 'artikel_tag.tag_id', 'left')
        ->where('artikel.id', '=', $id)->first();
    }

    public static function update_data($data, $id) {
        DB::beginTransaction();
        try {
            DB::table('artikel')
            ->where('id', $id)
            ->update([
                'judul' => $data['judul'],
                'isi' => $data['isi'],
                'slug' => Str::slug($data['judul'])
            ]);
            DB::table('artikel_tag')->where('artikel_id', '=', $id)->delete();
            foreach ($data['tags'] as $value) {
                DB::table('artikel_tag')
                ->insert([
                    'artikel_id' => $id,
                    'tag_id' => $value
                ]);
            }
            DB::commit();
            return "true";
        } catch(\Excetion $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    public static function destroy_data($id) {
        try {
            DB::table('artikel_tag')->where('artikel_id', '=', $id)->delete();
            return DB::table('artikel')->where('id', '=', $id)->delete();
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
