<?php

use App\Models\AnneeScolaire;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Filiere;
use App\Models\FiliereCategory;

function filiere_dropdown(){
    $filiere_categories = FiliereCategory::latest()->get();

    return $filiere_categories;
}


function getActiveAnnee(){
    $annee = AnneeScolaire::where('isActive', true)->first();

    return $annee;
}

function getFormatDate($date){
    $dateTime = new DateTime($date);
    return $dateTime->format('Y-m-d');
}

function getLatestPost($count){
    $posts = Blog::latest()->take($count)->get();
    $i = 0;
    foreach($posts as $post){
        $blogs[$i] = $post;
        $i++;
    }
   return $blogs;
}

function getFiliere($offset){
    $filieres = Filiere::offset($offset)
    ->limit(8)
    ->get();
    return $filieres;
}

function getMessageCount(){
    $contact = Contact::where('isLooking', 0)->count();

    return $contact;
}

//  function getFiliereCategory($id){
//     $filiere_category = FiliereCategory::findOrFail($id);

//     return $filiere_category;
// }
