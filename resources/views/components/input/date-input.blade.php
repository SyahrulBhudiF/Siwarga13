<label class="flex flex-col gap-2 w-full" for="{{$id}}">
    <span class="text-Neutral/100 text-sm font-medium">{{$slot}}</span>
    <input type="text"
           class="outline-none border border-Neutral/30 rounded-[1.25rem] px-4 py-2 focus:border-Primary/10 focus:text-Primary/10"
           id="{{$id}}" name="{{$id}}" placeholder="{{$placeholder}}" value="{{$value}}" onblur="validateDate(this)">
    <small id="{{$id}}-error" class="text-red-500"></small>
</label>
<script>
    function validateDate(input) {
        let pattern = /^(0[1-9]|[12][0-9]|3[01]) (Januari|Februari|Maret|April|Mei|Juni|Juli|Agustus|September|Oktober|November|Desember) ((19|20)\d\d)$/;
        let isValid = pattern.test(input.value);
        let errorElement = document.getElementById(input.id + '-error');

        if (!isValid) {
            errorElement.textContent = 'Format salah atau tanggal tidak valid';
        } else {
            errorElement.textContent = '';
        }
    }
</script>
