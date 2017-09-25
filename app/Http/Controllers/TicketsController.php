<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketsFormRequest;
use Illuminate\Http\Request;
use App\Ticket;
use Illuminate\Support\Facades\Mail;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', ['tickets'=>$tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TicketsFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketsFormRequest $request)
    {
        $slug = uniqid();
        $ticket = new Ticket([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => $slug
        ]);
        $ticket->save();

        /*send email*/
        $data = [
            'ticket' => $slug,
        ];
        Mail::send('emails.ticket', $data, function($message){
            $message->from('ticket@loc.ua', 'Tickets Site');
            $message->to('mailtrap@test.ua')->subject('There is a new ticket!');
        });

        return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  Ticket $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket = Ticket::where('slug', $slug)->first();
        $comments = $ticket->comments()->get();
        //dd($ticket);
        return view('tickets.show', compact('ticket', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket = Ticket::where('slug', $slug)->first();
        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *@param  \App\Http\Requests\TicketsFormRequest  $request

     * @return \Illuminate\Http\Response
     */
    public function update($slug, TicketsFormRequest $request)
    {

        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        $ticket->title = $request->get('title');
        $ticket->content = $request->get('content');
        if($request->get('status') != null){
            $ticket->status = 0;
        } else {
            $ticket->status = 1;
        }
        $ticket->save();
        return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'The ticket '.$slug. ' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ticket = Ticket::whereSlug($slug)->first();
        $ticket->delete();
        return redirect('/tickets')->with('status', 'the ticket '. $slug. ' has been deleted!');
    }
}
