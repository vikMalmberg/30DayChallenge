<td class="text-center pl-4 pr-4 pt-2 pb-2 border-t-2">
    <form
    action="{{ route('personal.challenges.store')}}"
    method="POST"
    >
    @csrf
    <a href="#">
        <button class="bg-green-lighter
                        text-green-dark font-bold py-2
                        px-4 rounded-full
                        font-hairline"
                type = "submit">
            Sign up
         </button>
     </a>
     <input hidden type="text" name="challenge_id" value={{ $challenge->id }}>
     </form>
</td>
