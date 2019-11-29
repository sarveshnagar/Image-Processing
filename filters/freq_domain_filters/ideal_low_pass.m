function flag=ideal_low_pass(img, outimg, cfreq)
	%Loading Image
	im=double(rgb2gray(imread(img)));
	[M,N]=size(im);
	F_u_v=fft2(im);
	F_u_v=(fftshift(F_u_v));

	%set up range of variables
	u=0:(M-1);
	v=0:(N-1);
	
	%compute the indices for use in meshgrid
	idx=find(u>M/2);
	u(idx)=u(idx)-M;
	idy=find(v>N/2);
	v(idy)=v(idy)-N;
	
	%compute the meshgrid arrays
	[V,U]=meshgrid(v,u);
	D=sqrt(U.^2+V.^2);
	D0=cfreq; %cutoff frequency
	H=ifftshift(double(D<=D0));
	
	%Applying the transfer function
	g=real(ifft2(H.*F_u_v));
	out=uint8(abs(g));
	
	%saving file
	%if contains(img, 'jpg') || contains(img, 'jpeg')
	%	imwrite(out, outimg, 'jpg', 'Quality', 100, 'Bitdepth', 8);
	%else
		imwrite(out, outimg);
	%end
	flag=1;
end