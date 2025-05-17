<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StreamMuse Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Segoe UI', sans-serif;
        }
        
        body {
            background-color: #0f0a1e;
            color: #fff;
            line-height: 1.6;
            background-image: url('/img/proofile.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }
                
        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 30px 15px;
        }
        
        .profile-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        
        .profile-header h1 {
            font-size: 38px;
            font-weight: 700;
            color: #fff;
            position: relative;
            font-family: 'Georgia', serif;
        }
        
        .profile-header span {
            color: #e637b5;
        }
        
        .profile-header h1:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #9c27b0, #e637b5);
            border-radius: 2px;
        }
        
        .profile-tagline {
            color: #a495c9;
            font-size: 16px;
            margin-top: 20px;
            font-style: italic;
        }
        
        .profile-actions {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-primary {
            background: linear-gradient(90deg, #9c27b0, #e637b5);
            color: white;
            box-shadow: 0 4px 15px rgba(230, 55, 181, 0.3);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(230, 55, 181, 0.4);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
        
        .profile-content {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
        }
        
        .profile-edit, .profile-preview {
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            overflow: hidden;
        }
        
        .profile-edit {
            background-color: rgba(29, 19, 54, 0.7);
            backdrop-filter: blur(10px);
            padding: 30px;
            border: 1px solid rgba(156, 39, 176, 0.3);
        }
        
        .section-title {
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #e637b5;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .section-title:after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: rgba(156, 39, 176, 0.5);
        }
        
        .form-group {
            margin-bottom: 30px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-col {
            flex: 1;
        }
        
        .form-control {
            position: relative;
            margin-bottom: 20px;
        }
        
        .form-control label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #a495c9;
            margin-bottom: 8px;
        }
        
        .input-field {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid rgba(156, 39, 176, 0.3);
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            color: #fff;
            background-color: rgba(15, 10, 30, 0.5);
        }
        
        .input-field:focus {
            border-color: #e637b5;
            box-shadow: 0 0 0 3px rgba(230, 55, 181, 0.2);
            outline: none;
            background-color: rgba(29, 19, 54, 0.8);
        }
        
        .input-field::placeholder {
            color: rgba(164, 149, 201, 0.5);
        }
        
        textarea.input-field {
            min-height: 120px;
            resize: vertical;
        }
        
        .file-input-container {
            position: relative;
            margin-top: 20px;
        }
        
        .file-input-label {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            border: 2px dashed rgba(156, 39, 176, 0.4);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: rgba(15, 10, 30, 0.5);
        }
        
        .file-input-label:hover {
            border-color: #e637b5;
            background-color: rgba(230, 55, 181, 0.1);
        }
        
        .file-input-label i {
            font-size: 20px;
            color: #e637b5;
        }
        
        .file-input-text {
            font-size: 14px;
            font-weight: 500;
            color: #a495c9;
        }
        
        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .profile-banner {
            height: 180px;
            background: linear-gradient(135deg, #1d1336, #3a1062);
            position: relative;
            overflow: hidden;
        }
        
        .banner-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200"><rect width="200" height="200" fill="%23130a28" opacity="0.5"/><rect x="0" y="0" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.15"/><rect x="80" y="0" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.1"/><rect x="160" y="0" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.15"/><rect x="40" y="40" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.1"/><rect x="120" y="40" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.15"/><rect x="0" y="80" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.1"/><rect x="80" y="80" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.15"/><rect x="160" y="80" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.1"/><rect x="40" y="120" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.15"/><rect x="120" y="120" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.1"/><rect x="0" y="160" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.15"/><rect x="80" y="160" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.1"/><rect x="160" y="160" width="40" height="40" rx="5" fill="%239c27b0" opacity="0.15"/></svg>');
            opacity: 0.8;
        }
        
        .profile-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: rgba(230, 55, 181, 0.2);
            backdrop-filter: blur(10px);
            padding: 8px 16px;
            border-radius: 30px;
            color: white;
            font-weight: 700;
            letter-spacing: 1px;
            font-size: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(230, 55, 181, 0.4);
        }
        
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 5px solid #1d1336;
            box-shadow: 0 5px 20px rgba(156, 39, 176, 0.3);
            overflow: hidden;
            background-color: #0f0a1e;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 10;
            margin: -60px auto 20px;
            position: relative;
        }
        
        .profile-avatar:after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 50%;
            border: 2px solid rgba(230, 55, 181, 0.4);
            box-shadow: inset 0 0 15px rgba(230, 55, 181, 0.2);
        }
        
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .profile-info {
            padding: 0 30px 30px;
            text-align: center;
            background-color: rgba(29, 19, 54, 0.8);
            backdrop-filter: blur(10px);
        }
        
        .profile-name {
            font-size: 24px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 5px;
        }
        
        .profile-location {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            color: #a495c9;
            font-size: 14px;
            margin-bottom: 20px;
        }
        
        .profile-bio {
            font-size: 14px;
            color: #d4cce6;
            margin-bottom: 25px;
            text-align: center;
            line-height: 1.6;
        }
        
        .profile-stats {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .stat-item {
            text-align: center;
            flex: 1;
            padding: 15px 10px;
            border-radius: 10px;
            background-color: rgba(15, 10, 30, 0.5);
            transition: all 0.3s ease;
            border: 1px solid rgba(156, 39, 176, 0.2);
        }
        
        .stat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            background-color: rgba(230, 55, 181, 0.1);
            border-color: rgba(230, 55, 181, 0.3);
        }
        
        .stat-value {
            font-size: 20px;
            font-weight: 700;
            color: #e637b5;
        }
        
        .stat-label {
            font-size: 12px;
            color: #a495c9;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(15, 10, 30, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a495c9;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(156, 39, 176, 0.2);
        }
        
        .social-icon:hover {
            transform: translateY(-3px) scale(1.1);
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .social-icon.twitter:hover {
            background: #1DA1F2;
            border-color: #1DA1F2;
        }
        
        .social-icon.facebook:hover {
            background: #4267B2;
            border-color: #4267B2;
        }
        
        .social-icon.instagram:hover {
            background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
            border-color: #dc2743;
        }
        
        .social-icon.linkedin:hover {
            background: #0077B5;
            border-color: #0077B5;
        }
        
        .profile-job {
            color: #e637b5;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 16px;
        }
        
        .profile-education {
            color: #a495c9;
            font-size: 14px;
            margin-bottom: 20px;
        }
        
        .info-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #9c27b0, #e637b5);
            margin: 0 auto 20px;
            border-radius: 3px;
        }
        
        .settings-btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
            width: 45px;
            height: 45px;
            background: rgba(15, 10, 30, 0.7);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            color: #a495c9;
            transition: all 0.3s ease;
            border: 1px solid rgba(156, 39, 176, 0.3);
        }
        
        .settings-btn:hover {
            transform: rotate(90deg);
            color: #e637b5;
            background: rgba(230, 55, 181, 0.1);
            border-color: rgba(230, 55, 181, 0.5);
        }
        
        .btn-submit {
            background: linear-gradient(90deg, #9c27b0, #e637b5);
            color: white;
            padding: 14px 28px;
            border-radius: 8px;
            border: none;  
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(230, 55, 181, 0.3);
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(230, 55, 181, 0.4);
        }
        
        .btn-reset {
            background: rgba(15, 10, 30, 0.5);
            color: #a495c9;
            padding: 14px 28px;
            border-radius: 8px;
            border: 1px solid rgba(156, 39, 176, 0.3);
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-block;
            margin-right: 15px;
            margin-top: 20px;
        }
        
        .btn-reset:hover {
            background: rgba(15, 10, 30, 0.8);
            color: #fff;
            border-color: rgba(230, 55, 181, 0.5);
        }
        
        .form-buttons {
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        
        .interest-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .interest-tag {
            background: rgba(156, 39, 176, 0.1);
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 12px;
            color: #d4cce6;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: all 0.3s ease;
            border: 1px solid rgba(156, 39, 176, 0.3);
        }
        
        .interest-tag:hover {
            background: rgba(230, 55, 181, 0.2);
            transform: translateY(-2px);
            border-color: rgba(230, 55, 181, 0.5);
        }
        
        .input-icon {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #a495c9;
        }
        
        .subscription-badge {
            background: linear-gradient(90deg, #9c27b0, #e637b5);
            color: white;
            font-size: 12px;
            font-weight: 700;
            padding: 3px 12px;
            border-radius: 20px;
            margin-left: 10px;
            box-shadow: 0 2px 8px rgba(230, 55, 181, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .preview-category {
            margin-top: 20px;
            margin-bottom: 15px;
        }
        
        .category-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #a495c9;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .genre-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
            justify-content: center;
        }
        
        .genre-pill {
            background: rgba(15, 10, 30, 0.5);
            color: #d4cce6;
            font-size: 11px;
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid rgba(156, 39, 176, 0.3);
        }
        
        @media (max-width: 992px) {
            .profile-content {
                grid-template-columns: 1fr;
            }
            
            .profile-edit, .profile-preview {
                width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .profile-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
            
            .profile-actions {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <div>
                <h1>Stream<span>Muse</span> Profile</h1>
                <div class="profile-tagline">Where stories live, and viewers belong</div>
            </div>
         <div class="profile-actions">
    <a href="{{ route('home') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i>
        Back to Home
    </a>
 
</div>
        </div>
        
        <form method="POST" action="{{ route('profile_save', auth()->id()) }}" enctype="multipart/form-data">
            @csrf
            <div class="profile-content">
                <!-- Left Column - Edit Form -->
                <div class="profile-edit">
                    <div class="section-title">
                        <i class="fas fa-user-circle"></i>
                        Personal Information
                    </div>
                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-control">
                                    <label for="username">Display Name</label>
                                    <input type="text" id="username" name="username" class="input-field" value="{{ Auth::user()->name }}">
                                    <span class="input-icon"><i class="fas fa-user"></i></span>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-control">
                                    <label for="email">Email Address</label>
                                    <input type="email" id="email" name="email" class="input-field" value="{{ Auth::user()->email }}">
                                    <span class="input-icon"><i class="fas fa-envelope"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-control">
                                    <label for="job">Occupation</label>
                                    <input type="text" id="job" name="title" class="input-field" value="{{ !empty($user_profile->title) ? $user_profile->title : '' }}" placeholder="Your Occupation">
                                    <span class="input-icon"><i class="fas fa-briefcase"></i></span>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-control">
                                    <label for="school">Education</label>
                                    <input type="text" id="school" name="school" class="input-field" value="{{ !empty($user_profile->school) ? $user_profile->school : '' }}" placeholder="Your School or University">
                                    <span class="input-icon"><i class="fas fa-graduation-cap"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="section-title">
                        <i class="fas fa-phone-alt"></i>
                        Contact Details
                    </div>
                    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-control">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" id="phone" name="phone" class="input-field" value="{{ !empty($user_profile->phone) ? $user_profile->phone : '' }}" placeholder="Your Phone Number">
                                    <span class="input-icon"><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-control">
                                    <label for="website">Website</label>
                                    <input type="url" id="website" name="website" class="input-field" value="{{ !empty($user_profile->website) ? $user_profile->website : '' }}" placeholder="Your Website URL">
                                    <span class="input-icon"><i class="fas fa-globe"></i></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-control">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="input-field" value="{{ !empty($user_profile->address) ? $user_profile->address : '' }}" placeholder="Your Address">
                            <span class="input-icon"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-control">
                                    <label for="city">City</label>
                                    <input type="text" id="city" name="city" class="input-field" value="{{ !empty($user_profile->city) ? $user_profile->city : '' }}" placeholder="Your City">
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-control">
                                    <label for="country">Country</label>
                                    <input type="text" id="country" name="country" class="input-field" value="{{ !empty($user_profile->country) ? $user_profile->country : '' }}" placeholder="Your Country">
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-control">
                                    <label for="postal">Postal Code</label>
                                    <input type="text" id="postal" name="postal" class="input-field" value="{{ !empty($user_profile->postal_code) ? $user_profile->postal_code : '' }}" placeholder="Your Postal Code">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="section-title">
                        <i class="fas fa-film"></i>
                        About You &amp; Preferences
                    </div>
                    
                    <div class="form-group">
                        <div class="form-control">
                            <label for="bio">Bio</label>
                            <textarea id="bio" name="bio" class="input-field" placeholder="Tell us about yourself and your favorite movies or shows...">{{ !empty($user_profile->bio) ? $user_profile->bio : '' }}</textarea>
                        </div>
                        
                        <div class="form-control">
                            <label>Favorite Genres</label>
                            <div class="interest-tags">
                                <div class="interest-tag">
                                    Action
                                    <i class="fas fa-times"></i>
                                </div>
                                <div class="interest-tag">
                                    Sci-Fi
                                    <i class="fas fa-times"></i>
                                </div>
                                <div class="interest-tag">
                                    Drama
                                    <i class="fas fa-times"></i>
                                </div>
                                <div class="interest-tag">
                                    Comedy
                                    <i class="fas fa-times"></i>
                                </div>
                                <div class="interest-tag">
                                    <i class="fas fa-plus"></i>
                                    Add more
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-control">
                            <label for="file">Profile Picture</label>
                            <div class="file-input-container">
                                <label for="file" class="file-input-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span class="file-input-text">Choose file or drag and drop</span>
                                </label>
                                <input type="file" id="file" name="file" class="file-input" accept="image/*">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-buttons">
                        <button type="reset" class="btn-reset">Reset</button>
                        <button type="submit" class="btn-submit">Save Changes</button>
                    </div>
                </div>
                
                <!-- Right Column - Profile Preview -->
                <div class="profile-preview">
                    <div class="profile-banner">
                        <div class="banner-overlay"></div>
                        <div class="profile-badge">Premium Member</div>
                    </div>
                    
                    <div class="profile-info">
                        <div class="profile-avatar">
                            <img src="{{ !empty($user_profile->pic) ? $user_profile->pic : '/img/profile.png' }}" alt="Profile Picture">
                        </div>
                        
                        <h2 class="profile-name">{{ Auth::user()->name }}</h2>
                        <div class="profile-location">
                            <i class="fas fa-user"></i>
                            StreamMuse Member
                        </div>
                        
                        <div class="profile-job">{{ !empty($user_profile->title) ? $user_profile->title : 'Film Enthusiast' }}</div>
                        <div class="profile-education">{{ !empty($user_profile->school) ? $user_profile->school : 'Loves binge-watching' }}</div>
                        
                        <div class="info-divider"></div>
                        
                        <div class="profile-stats">
                           
                            <div class="stat-item">
                                <div class="stat-value">{{ rand(10, 50) }}</div>
                                <div class="stat-label">Watchlist</div>
                            </div>
                          
                        </div>
                        
                        <div class="profile-bio">
                            {{ !empty($user_profile->bio) ? $user_profile->bio : 'Passionate about great storytelling and cinematic experiences. Always looking for the next show to obsess over!' }}
                        </div>
                        
                        <div class="preview-category">
                            <div class="category-label">
                                <i class="fas fa-film"></i>
                                Favorite Genres
                            </div>
                            <div class="genre-list">
                                <div class="genre-pill">Action</div>
                                <div class="genre-pill">Sci-Fi</div>
                                <div class="genre-pill">Drama</div>
                                <div class="genre-pill">Comedy</div>
                            </div>
                        </div>
                        
                        <div class="social-links">
                            <a href="#" class="social-icon twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="settings-btn">
                        <i class="fas fa-cog"></i>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Récupérer l'ID de l'utilisateur actuel à partir du formulaire
        const formAction = document.querySelector('form').getAttribute('action');
        const currentUserId = formAction.split(',').pop().split(')')[0].trim();
        
        console.log('Utilisateur connecté ID:', currentUserId);
        
        // Fonction pour obtenir une clé spécifique à l'utilisateur
        function getUserKey(fieldName) {
            return 'user_' + currentUserId + '_' + fieldName;
        }
        
        // Fonction pour sauvegarder une valeur pour l'utilisateur actuel
        function saveUserData(fieldName, value) {
            localStorage.setItem(getUserKey(fieldName), value);
        }
        
        // Fonction pour récupérer une valeur pour l'utilisateur actuel
        function getUserData(fieldName, defaultValue = '') {
            const value = localStorage.getItem(getUserKey(fieldName));
            return value !== null ? value : defaultValue;
        }
        
        // Immédiatement mettre à jour l'aperçu avec les données sauvegardées
        updateProfilePreview();
        
        // Configurer les écouteurs d'événements pour tous les champs de saisie
        const inputFields = [
            'username', 'job', 'school', 'bio', 
            'phone', 'website', 'address',
            'city', 'country', 'postal'
        ];
        
        inputFields.forEach(fieldId => {
            const field = document.getElementById(fieldId);
            if (field) {
                // Charger la valeur sauvegardée si elle existe, sinon utiliser la valeur actuelle du champ
                const savedValue = getUserData(fieldId);
                if (savedValue) {
                    field.value = savedValue;
                }
                
                // Ajouter un écouteur d'événement pour sauvegarder les changements
                field.addEventListener('input', function() {
                    saveUserData(fieldId, this.value);
                    updateProfilePreview();
                });
            }
        });
        
        // Gérer l'entrée de fichier pour la photo de profil
        const fileInput = document.getElementById('file');
        if (fileInput) {
            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        saveUserData('profileImage', e.target.result);
                        updateProfileImage(e.target.result);
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }
        
        // Charger l'image de profil sauvegardée s'il y en a une
        const savedImage = getUserData('profileImage');
        if (savedImage) {
            updateProfileImage(savedImage);
        }
        
        // Gérer la soumission du formulaire
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                inputFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field) {
                        saveUserData(fieldId, field.value);
                    }
                });
                
                updateProfilePreview();
            });
        }
        
        // Fonction pour mettre à jour la section d'aperçu du profil
        function updateProfilePreview() {
            // Mettre à jour le nom
            const username = getUserData('username');
            if (username) {
                document.querySelector('.profile-name').textContent = username;
            }
            
            // Mettre à jour le poste
            const job = getUserData('job');
            if (job) {
                document.querySelector('.profile-job').textContent = job;
            }
            
            // Mettre à jour l'éducation
            const school = getUserData('school');
            if (school) {
                document.querySelector('.profile-education').textContent = school;
            }
            
            // Mettre à jour la bio
            const bio = getUserData('bio');
            if (bio) {
                document.querySelector('.profile-bio').textContent = bio;
            }
            
            // Mettre à jour l'emplacement
            const city = getUserData('city', 'City');
            const country = getUserData('country', 'Country');
            document.querySelector('.profile-location').innerHTML = `<i class="fas fa-map-marker-alt"></i> ${city}, ${country}`;
        }
        
        // Fonction pour mettre à jour l'image de profil
        function updateProfileImage(imageData) {
            const profileAvatar = document.querySelector('.profile-avatar img');
            if (profileAvatar) {
                profileAvatar.src = imageData;
            }
        }
        
        // Gérer le bouton de réinitialisation
        const resetButton = document.querySelector('.btn-reset');
        if (resetButton) {
            resetButton.addEventListener('click', function() {
                if (confirm('Are you sure you want to reset all unsaved changes?')) {
                    inputFields.forEach(fieldId => {
                        const field = document.getElementById(fieldId);
                        if (field) {
                            field.value = getUserData(fieldId, '');
                        }
                    });
                    updateProfilePreview();
                }
            });
        }
        
        // Gérer le bouton des paramètres
        const settingsBtn = document.querySelector('.settings-btn');
        if (settingsBtn) {
            settingsBtn.addEventListener('click', function() {
                const action = prompt(`Profile Settings (User #${currentUserId}):\n1. View locally stored data\n2. Clear local data\nEnter your choice number:`);
                
                switch (action) {
                    case '1':
                        // Afficher les données stockées
                        let userData = {};
                        inputFields.forEach(field => {
                            userData[field] = getUserData(field);
                        });
                        alert('Locally stored profile data:\n' + JSON.stringify(userData, null, 2));
                        break;
                    case '2':
                        // Supprimer les données
                        if (confirm('Are you sure you want to delete all your locally stored profile data?')) {
                            inputFields.forEach(field => {
                                localStorage.removeItem(getUserKey(field));
                            });
                            localStorage.removeItem(getUserKey('profileImage'));
                            alert('Local data cleared successfully!');
                            location.reload();
                        }
                        break;
                    default:
                        alert('No action selected');
                }
            });
        }
        
        // Gestion des tags d'intérêt
        const interestTags = document.querySelectorAll('.interest-tag');
        interestTags.forEach(tag => {
            tag.addEventListener('click', function(e) {
                if (e.target.classList.contains('fa-times')) {
                    // Supprimer le tag
                    this.remove();
                } else if (this.querySelector('.fa-plus')) {
                    // Ajouter un nouveau tag
                    const newTag = prompt('Enter a new interest:');
                    if (newTag && newTag.trim() !== '') {
                        const tagsContainer = this.parentElement;
                        const newTagElement = document.createElement('div');
                        newTagElement.className = 'interest-tag';
                        newTagElement.innerHTML = `${newTag} <i class="fas fa-times"></i>`;
                        tagsContainer.insertBefore(newTagElement, this);
                        
                        // Ajouter un écouteur d'événement au nouveau tag
                        newTagElement.addEventListener('click', function(e) {
                            if (e.target.classList.contains('fa-times')) {
                                this.remove();
                            }
                        });
                    }
                }
            });
        });
    });
    </script>
</body>
</html>