<div>
    <form
    action="{{ route('personal.challenges.store')}}"
    method="POST"
    >
    @csrf
         <button class="bg-green-lighter
                        hover:bg-green-light
                        text-green-dark
                        font-bold
                        py-2
                        mt-4
                        focus:outline-none
                        rounded-full
                        w-12
                        text-xs
                        lg:text-base
                        lg:w-32
         ">Sign up</button>
     <input hidden type="text" name="challenge_id" value={{ $challenge->id }}>
     </form>
</div>
