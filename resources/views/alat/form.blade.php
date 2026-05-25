<div class="mb-3">
    <label class="form-label">Nama Alat</label>

    <input type="text"
           name="nama_alat"
           class="form-control @error('nama_alat') is-invalid @enderror"
           value="{{ old('nama_alat', $alat->nama_alat ?? '') }}">

    @error('nama_alat')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Tahun</label>

    <input type="number"
           name="tahun"
           class="form-control @error('tahun') is-invalid @enderror"
           value="{{ old('tahun', $alat->tahun ?? '') }}">

    @error('tahun')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Link Foto Alat (Ambil dari Google)</label>
    <input type="text" 
           name="foto" 
           class="form-control @error('foto') is-invalid @enderror" 
           placeholder="Contoh: https://alamat-gambar.com/foto.jpg"
           value="{{ old('foto', $alat->foto ?? '') }}">
    @error('foto')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Merek</label>

    <input type="text"
           name="merek"
           class="form-control @error('merek') is-invalid @enderror"
           value="{{ old('merek', $alat->merek ?? '') }}">

    @error('merek')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label class="form-label">Status Kondisi Alat</label>
    <select name="status" class="form-select">
        <option value="Siap Pakai" {{ old('status', $alat->status ?? '') == 'Siap Pakai' ? 'selected' : '' }}>Siap Pakai</option>
        <option value="Sedang Rusak" {{ old('status', $alat->status ?? '') == 'Sedang Rusak' ? 'selected' : '' }}>Sedang Rusak</option>
        <option value="Dalam Kalibrasi" {{ old('status', $alat->status ?? '') == 'Dalam Kalibrasi' ? 'selected' : '' }}>Dalam Kalibrasi</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Lokasi</label>

    <input type="text"
           name="lokasi"
           class="form-control @error('lokasi') is-invalid @enderror"
           value="{{ old('lokasi', $alat->lokasi ?? '') }}">

    @error('lokasi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>