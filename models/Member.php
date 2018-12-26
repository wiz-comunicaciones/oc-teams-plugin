<?php namespace Wiz\Teams\Models;

use Model;

class Member extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;
    use \October\Rain\Database\Traits\Nullable;
    use \October\Rain\Database\Traits\NestedTree;

    protected $dates = [
        'deleted_at'
    ];

    public $table = 'wiz_teams_members';

    protected $nullable = [
        'job',
        'email',
        'phone',
        'description',
        'linkedin_url',
        'facebook_url',
        'instagram_user',
        'twitter_user',
    ];

    public $rules = [
        'name' => 'required',
        'job' => 'nullable',
        'email' => 'nullable|email',
        'phone' => 'nullable',
        'linkedin_url' => 'nullable|url',
        'facebook_url' => 'nullable|url',
        'instagram_user' => 'nullable',
        'twitter_user' => 'nullable'
    ];

    public $attachOne = [
        'profile_image' => [
            'System\Models\File',
            'delete' => true,
            'public' => true
        ],
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    public function getSocialUrl($socialNetwork = null)
    {
        switch ($socialNetwork) {
            case 'linkedin':
            case 'facebook':
                return $this->{$socialNetwork . '_url'};
                break;
            case 'instagram':
            case 'twitter':
                return 'https://' . $socialNetwork . '.com/' . $this->{$socialNetwork . '_user'};
                break;
        }
        return 'javascript:false';
    }

    public function hasJob()
    {
        return !is_null($this->job);
    }

    public function hasPhone()
    {
        return !is_null($this->phone);
    }

    public function hasDescription()
    {
        return !is_null($this->description);
    }

    public function hasSocialInfo()
    {
        return (
            !is_null($this->linkedin_url) ||
            !is_null($this->facebook_url) ||
            !is_null($this->instagram_user) ||
            !is_null($this->twitter_user)
        );
    }

    public function hasLinkedin()
    {
        return !is_null($this->linkedin_url);
    }

    public function hasFacebook()
    {
        return !is_null($this->facebook_url);
    }

    public function hasInstagram()
    {
        return !is_null($this->instagram_user);
    }

    public function hasTwitter()
    {
        return !is_null($this->twitter_user);
    }

    public function hasProfileImage()
    {
        return (bool) count($this->profile_image);
    }
}
